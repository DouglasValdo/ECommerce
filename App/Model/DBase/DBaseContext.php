<?php namespace Library\Model\DBase;


use PDO;

class DBaseContext
{
    private static $instanceDBase;

    public static function GetContext():PDO
    {
        if(static::$instanceDBase === null)
            static::$instanceDBase = new \PDO(
                "mysql:host=localhost;dbname=Ecommerce",
                "douglasvaldo", "douglas.,valdo",
                array(\PDO::ERRMODE_EXCEPTION, \PDO::ERRMODE_WARNING,
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));

        return static::$instanceDBase;
    }

    private function __construct(){}

    private function __clone(){}

}