<?php
require_once "../vendor/autoload.php";

use Library\Model\Session\SessionEventType;
use Library\Model\Session\SessionManager;
use \Library\Model\Authentication\AuthenticationFactory;
use \Library\Model\Authentication\AuthenticatorType;

if (SessionManager::call(SessionEventType::read, array("SessionID" => "user")) != null)
    header("Location: home.php");

$email      = $_POST["email"]??"";
$password   = $_POST["password"]??"";

$auth = AuthenticationFactory::Authenticate(AuthenticatorType::defaultAuth);

$currentUser = $auth->Login($email, $password);

if($currentUser == null)
    header("Location: login.php?message=".urlencode("Account don't exist!"));
else{
    SessionManager::call(SessionEventType::write, array("SessionID" => "user", "data" => $currentUser));
    header("Location: index.php");
}


