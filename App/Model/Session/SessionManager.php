<?php namespace Library\Model\Session;


class SessionManager
{
    public static function call(string $event, $param)
    {
        if (static::start() == false)
            session_start();
        if($param == null || $param["SessionID"] == null)
            return null;

        $sessionID = $param["SessionID"];

        switch ($event) {
            case SessionEventType::write:
                $data = $param["data"];
                return static::$event($sessionID, $data);
            case SessionEventType::delete:
            case SessionEventType::read:
                return static::$event($sessionID);
            default:
                return "The select Function Name dont exist!!!";
        }
    }

    private static function start(): bool
    {
        if (php_sapi_name() !== 'cli') {

            if (version_compare(phpversion(), '5.4.0', '>='))
                return session_status() === PHP_SESSION_ACTIVE;
            else
                return session_id() === '' ? false : true;
        }

        return false;
    }

    private static function write($sessionID, $data): bool
    {
        $_SESSION[$sessionID] = $data;
        if (isset($_SESSION[$sessionID])) return true;

        else return false;
    }

    private static function read($sessionID)
    {
        return (!isset($_SESSION[$sessionID])) ? null : $_SESSION[$sessionID];
    }

    public static function close()
    {
        session_destroy();
    }

    private static function delete($sessionID): bool
    {
        if (isset($_SESSION[$sessionID])) {
            unset($_SESSION[$sessionID]);
            return true;

        } else return false;
    }
}