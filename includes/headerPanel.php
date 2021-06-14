<?php require_once('includes/conexion.php'); ?>
<?php require_once('includes/helpers.php'); ?>

<?php redirect();?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Panel">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel</title>
        <!-- CSS -->
        <!-- <link rel="stylesheet" href="/css/sign.css"> -->
        <link rel="stylesheet" href="./css/panel.css">
        <!-- FONT -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <!-- MATERIAL ICONS -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">

    </head>
    <body>
        <header class="site-header">
            <div class="header-container">
                <div class="logo-container">
                    <figure class="logo">
                        <a href="index.php">
                            <img src="./assets/img/Logo.png" alt="">
                        </a>
                    </figure>
                </div>
                <div class="search-container">
                    <div class="search">
                        <div class="icon-search">
                            <span class="material-icons-round icon">search</span>
                        </div>
                        <input type="text">
                    </div>
                </div>
                <div class="logout-container">
                    <div class="nav-menu__items logout">
                            <a class="logout_items" href="logout.php">
                                <span class="material-icons-round">power_settings_new</span>
                                <p class="logout-text">Logout</p>
                            </a>
                    </div>
                    
                </div>
            </div>
        </header>