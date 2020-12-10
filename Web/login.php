<?php
require_once "../vendor/autoload.php";

use Library\Model\Session\SessionEventType;
use Library\Model\Session\SessionManager;

if (SessionManager::call(SessionEventType::read, array("SessionID" => "user")) != null)
    header("Location: home.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<div class="global-container">
    <div class="left-menu">
        <div class="right-menu-container">
            <form class="ui form login-form" method="post" action="loginRedirect.php">
                <div class="field">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email..." id="email">
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password..." id="password">
                </div>
                <button class="ui button button-login default" type="submit" id="button-login">Login</button>
                <div class="login-type-separator">
                    <p>-- OR --</p>
                </div>
                <button class="ui button button-login google" type="submit" id="button-login">Google</button>
                <button class="ui button button-login facebook" type="submit" id="button-login">Facebook</button>
                <a href="profile.php" class="register-link">Register</a>
            </form>
        </div>
    </div>
    <div class="right-menu">
        <div class="logo-container">
            <img src="img/logo.png">
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</html>
