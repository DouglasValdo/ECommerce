<?php
require_once "../vendor/autoload.php";

use Library\Model\Session\SessionEventType;
use Library\Model\Session\SessionManager;

if (SessionManager::call(SessionEventType::read, array("SessionID" => "user")) != null)
    header("Location: home.php");