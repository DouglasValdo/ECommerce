<?php
require_once "../vendor/autoload.php";

use Library\Model\Session\SessionEventType;
use Library\Model\Session\SessionManager;

if (SessionManager::call(SessionEventType::read, array("sessionID" => "user")) == null)
    header("Location: login.php?message=" . urlencode("Access Denied You NEED to Log In!"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index Page</title>
</head>
<body>

</body>
</html>

