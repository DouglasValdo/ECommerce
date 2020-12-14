<?php
require_once '../vendor/autoload.php';
use \Library\Controller\StoreController;
use Library\Model\Session\SessionEventType;
use \Library\Model\Session\SessionManager;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Index Page</title>
</head>
<body>
    <div class="global-container" id="global-container">
        <div class="header-container">
            <div class="header-top-container header-child">
                <div class="user-account-menu"></div>
            </div>
            <div class="header-bottom-container header-child">
                <div class="container-menu-button header-bottom-container-child">
                    <div class="button-search-container">
                        <!--this one should become a React Component-->
                        <button class="ui basic button">
                            <i class="icon bars"></i>
                                CATEGORIES
                        </button>
                    </div>
                </div>
                <div class="search-container header-bottom-container-child">
                    <div class="search-content">
                        <!--this one should become a React Component-->
                        <div class="ui icon input search-input">
                            <input type="text" placeholder="Search...">
                            <i class="search icon"></i>
                        </div>
                    </div>
                </div>
                <div class="cart-container header-bottom-container-child" id="cart-container">
                    <!--this one should become a React Component-->
                    <div class="cart-button-container">
                        <?php
                        $storeController = new StoreController();
                        $currentUser = SessionManager::call(SessionEventType::read, array("SessionID" => "user"));

                        if($currentUser == null)
                            echo $storeController->GetUserCart("");
                        else
                            echo $storeController->GetUserCart($currentUser->Identifier);
                        ?>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="container-filter-menu"></div>
            <div class="container-content">
                <?php
                    $storeController = new StoreController();
                    echo $storeController->GetAllProducts();
                ?>
            </div>
        </div>
        <div class="footer"></div>
</body>
    <script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
<!--    <script type="text/babel" src="js/jsx/App.js"></script>-->
</html>
