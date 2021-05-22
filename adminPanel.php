
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Panel">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel</title>
        <!-- CSS -->
        <link rel="stylesheet" href="/css/style.css">
        <!-- CSS - LOGIN -->
        <link rel="stylesheet" href="/css/sign.css">
        <link rel="stylesheet" href="/css/tablet.css" media="screen and (min-width:600px)">
        <!-- CSS - LOGIN TABLET -->
        <link rel="stylesheet" href="/css/signTablet.css">
        <link rel="stylesheet" href="./css/panel.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    </head>
    <body>
        <header class="site-header">
            <div class="logo-container">
                <figure class="logo logo-panel">
                    <a href="index.php">
                        <img src="./assets/img/Logo.png" alt="">
                    </a>
                </figure>
            </div>
            <div class="search">
                <div class="search-container ">
                    <div class="search-logo">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="input-search form-items">
                        <input type="text" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="logout">
                <i class="fas fa-power-off" id="off"></i>
                <div class="text-logout"><p id="user">Logout</p></div>
                <!-- <i class="far fa-user" id="profile"></i> -->
            </div>
        </header>
        <main class="site-main">

        </main>
<?php //require_once('includes/footer.php'); ?>