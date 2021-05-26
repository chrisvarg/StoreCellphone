<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="index, follow">
        <meta name="description" content="Store Celphone">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="wclassth=device-wclassth, initial-scale=1.0">
        <title>Smartphone Store</title>
        <link rel="icon" type="image/png" href="/assets/img/Logo.png">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/tablet.css" media="screen and (min-width:600px)">
            <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <!-- HEADER -->
        <header class="site-header">
            <div class="header-container header-sign">
                <div class="header-menu">
                    <!-- logo header -->
                    <div class="logo-container">
                        <figure class="logo img-sign">
                            <a href="index.php">
                                <img src="./assets/img/Logo.png" alt="">
                            </a>
                        </figure>
                    </div>
                    <!-- menu -->
                    <div class="menu-container">
                        <input type="checkbox" id="btn-nav">
                        <label for="btn-nav">
                            <img src="./assets/img/menu.svg" alt="">
                        </label>
                        <nav class="nav-menu">
                            <ul>
                                <li class="nav-menu_items home"><a href="index.php">Home</a></li>
                                <li class="nav-menu_items"><a href="">Store</a></li>
                                <li class="nav-menu_items about"><a href="">About us</a></li>
                                <li class="nav-menu_items contact"><a href="">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- buttons sessions -->
                    <div class="sessions sessions-header">
                        <a href="signIn.php">
                            <input class="btn btn-session login" type="button" value="Sign in">
                        </a>
                        <a href="signUp.php">
                            <input class="btn btn-session registre" type="button" value="Sign up">
                        </a>
                    </div>
                </div>
            </div>
        </header>