
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
                    <div class="logout">
                            <a class="logout_items" href="">
                                <span class="material-icons-round">power_settings_new</span>
                                <p class="logout-text">Logout</p>
                            </a>
                    </div>
                </div>
            </div>
        </header>
        <main class="site-main">
            <div class="main-container">
                <aside class="nav">
                    <ul class="nav-menu">
                        <li class="nav-menu__items">
                            <a href="">
                                <span class="material-icons-round">space_dashboard</span>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-menu__items">
                            <a href="">
                                <span class="material-icons-round">inventory_2</span>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-menu__items">
                            <a href="">
                                <span class="material-icons-round">people</span>
                                <p>Customers</p>
                            </a>
                        </li>
                        <li class="nav-menu__items">
                            <a href="">
                                <span class="material-icons-round">manage_accounts</span>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-menu__items">
                            <a href="">
                                <span class="material-icons-round">person</span>
                                <p>My Data</p>
                            </a>
                        </li>
                        <li class="nav-menu__items logout">
                            <a href="">
                                <span class="material-icons-round">power_settings_new</span>
                                <p class="logout-text">Logout</p>
                            </a>
                        </li>
                    </ul>
                </aside>
                <div class="session-container">
                    <div class="session-text">
                        <?php if(isset($_SESSION['user'])):  ?>
                            <?php echo "<h2>Welcolme {$_SESSION['user']['nombre']} {$_SESSION['user']['apellidos']}</h2>"; ?>
                            <?php //echo "<pre>";
                            //var_dump($_SESSION['user']) . '</pre>';?>
                        <?php else: ?>
                            <?php echo "<p>Error Login</p>"; ?>
                        <?php endif; ?>
                    </div>
                    <div class="session-text message">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos corrupti rem impedit voluptas commodi!
                        In expedita repellendus odio iure impedit esse officia nostrum reprehenderit laborum ipsam aperiam minus recusandae, inventore ex quidem ab! placeat.</p>    
                    </div>
                    
                    <div class="prices">
                        <div class="prices-container">
                            <div class="prices-tittle">
                                <h2>sold products</h2>    
                            </div>
                            <div class="session-text price-text">
                                <h3>iPhone 13 Mini 64GB 4G</h3>
                            </div>
                        </div>
                        <div class="prices-container">
                            <div class="prices-tittle">
                                <h2>Total Sale</h2>    
                            </div>
                            <div class="session-text price-text">
                                <h3>$ 100.000</h3>
                            </div>
                        </div>
                        <div class="prices-container">
                            <div class="prices-tittle">
                                <h2>Users</h2>    
                            </div>
                            <div class="session-text price-text">
                                <h3>50 Users</h3>
                            </div>
                        </div>
                        
                    
                        
                    </div>

                </div>
            </div>
            
        </main>
<?php //require_once('includes/footer.php'); ?>