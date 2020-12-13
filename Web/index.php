<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <link rel="stylesheet" href="css/global.css">-->
    <link rel="stylesheet" href="css/index.css">
    <title>Index Page</title>
</head>
<body>
    <div class="global-container" id="global-container">
        <div class="header-container">
            <div class="search-container">
                <div class="ui search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search countries...">
                        <i class="search icon"></i>
                    </div>
                    <div class="results"></div>
                </div>
            </div>
            <div class="logo-container"></div>
            <div class="user-menu-container"></div>
        </div>
        <div class="left-menu"></div>
        <div class="container"></div>
        <div class="footer"></div>
    </div>
</body>
    <script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
    <script type="text/babel" src="js/jsx/App.js"></script>
</html>
