<?php namespace Library\Model\System;

use Library\Model\Authentication\AuthenticationFactory;
use Library\Model\Authentication\AuthenticatorType;
use Library\Model\Registration\Register;
use Library\Model\Registration\RegisterOutcome;
use Library\Model\Session\SessionEventType;
use Library\Model\Session\SessionManager;

class ApplicationSystem
{
    public function Login(string $email,  string $password):void
    {
        $auth = AuthenticationFactory::Authenticate(AuthenticatorType::defaultAuth);

        $currentUser =  $auth->Login($email, $password);

        if($currentUser == null)
        {
            header("Location: login.php?message=".urlencode("Account don't exist!"));
            return;
        }

        SessionManager::call(SessionEventType::write, array("SessionID" => "user", "data" => $currentUser));

        header("Location: index.php");
    }

    public function LogOut():void
    {
       $currentUser =  SessionManager::call(SessionEventType::read, array("SessionID" => "user"));

       if($currentUser == null) return;

       session_start();

       unset($_SESSION["user"]);

       session_destroy();

       header("Location: logout.php");
    }

    public function Register(string $alias, string $email, string $password):void
    {
        $register = new Register();

        $outcome = $register->Register($alias, $email, $password);

        if($outcome == RegisterOutcome::successful)
            $this->Login($email, $password);
        else
            header("Location: register.php?message".$outcome);
    }
}