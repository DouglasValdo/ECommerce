<?php

require_once "ValidatePageAccess.php";

use \Library\Model\System\ApplicationSystem;

$email      = $_POST["email"]??"";
$password   = $_POST["password"]??"";

$system = new ApplicationSystem();
$system->Login($email, $password);

