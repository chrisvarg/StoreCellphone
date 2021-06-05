
<main class="site-main">
    <div class="main-container">
        <aside class="nav">
            <ul class="nav-menu">
                
                <?php 
                /**
                 * Despliegue del menú según el tipo de usuario
                 */
                
                if(isset($_SESSION['user']['position'])): ?>
                <?php $typeUser = $_SESSION['user']['position']?>
                
                    <?php $menus = menuAdmin($typeUser); ?>
                    <?php foreach ($menus as $menu => $icon): ?>
                        <li class='nav-menu__items'>

                            <?php if ($menu == 'Dashboard'): ?>
                                <a href='<?="admin.php";?>'>

                            <?php elseif(isset($menu)): ?>
                                <a href='<?=strtolower(str_replace(' ', '', "$menu.php"));?>'>
                            <?php endif;?>
                                <span class='material-icons-round'><?=$icon?></span>
                                <p><?=$menu?></p>
                            </a>
                        </li>
                    <?php endforeach;?>
                <?php endif;?>

                <li class="nav-menu__items logout">
                    <a href="logout.php">
                        <span class="material-icons-round">power_settings_new</span>
                        <p class="logout-text">Logout</p>
                    </a>
                </li>
            </ul>
        </aside>