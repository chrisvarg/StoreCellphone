<?php require_once('includes/headerPanel.php'); ?>
<?php 
    $product = element($db, $_GET['id'], 'productos');
    $exist = elementExist($db, $_GET['id'], 'productos');
    $userCurrent = $_SESSION['user'];
?>
<?php require_once('includes/sidebarPanel.php'); ?>

<div class="session-container">
            <div class="session-text">
                <?php 
                    if(isset($_SESSION['user'])):?>
                        <h2><?=$product['nombre']?></h2>
                    <?php endif; ?>
            </div>
            
            <div class="alert alert-update">
                <?php if(isset($_SESSION['complete'])) :
                    echo "<div class='alert alert-complete alert-udpdate'>{$_SESSION['complete']}</div>"; ?>

                <?php endif; ?>        
            </div>

            <div class="element-container">
                <div class="element-image">
                    <figure>
                        <img src="./products/<?=$product['imagen']?>" alt="">
                    </figure>
                </div>

                <div class="session-text message element-text">
                    <div class="information dates element-text__date">
                        <h4>Id: <span><?=$product['id']?></span></h4>
                        <h4>Name: <span><?=$product['nombre']?></span></h4>
                        <h4>Brand: <span><?=$product['marca']?></span></h4>
                        <h4>Price: <span>$ <?=number_format($product['precio'], 0, ',', '.')?></span></h4>
                        <h4>Description: </h4>
                        <br>
                        <p><?=$product['description']?></p>
                    </div>    
                </div>
            </div>

            <div class="buttons buttons-elements">
                <ul class="buttons-container ">
                    <?php if ($userCurrent['position'] == 'boss'): ?> 
                            <li class="btn">
                                <a class="remove" href="remove-product.php?id=<?=$product['id']?>">
                                    <span class="material-icons-round">add_circle</span>
                                    <p>Remove</p>
                                </a>
                            </li>
                    <?php endif; ?> 
                    <li class="btn">
                        <a class="update" href="update-product.php?id=<?=$product['id']?>">
                            <span class="material-icons-round">add_circle</span>
                            <p>Update</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php eraserErrors();?>
</main>