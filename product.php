<?php require_once('includes/headerPanel.php'); ?>
<pre>
<?php 
    $product = product($db, $_GET['id']);
    $existe = productExist($db, $_GET['id']);
?>
</pre>
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
                    <?php //header("Refresh: 5; URL=product.php?id={$product['id']}")?>
                <?php endif; ?>        
            </div>
            <div class="product-container">
                

                <div class="product-image">
                    <figure>
                        <img src="./products/<?=$product['imagen']?>" alt="">
                    </figure>
                    
                </div>
                <div class="session-text message product-text">
                    <div class="information dates product-text__date">
                        <h4>Id: <span><?=$product['id']?></span></h4>
                        <h4>Name: <span><?=$product['nombre']?></span></h4>
                        <h4>Brand: <span><?=$product['marca']?></span></h4>
                        <h4>precio: <span>$ <?=number_format($product['precio'], 0, ',', '.')?></span></h4>
                        <h4>description: </h4>
                        <br>
                        <p><?=$product['description']?></p>
                    </div>    
                </div>
            </div>
            <div class="buttons buttons-products">
                <ul class="buttons-container ">
                    <li class="btn">
                        <a class="remove" href="remove-product.php?id=<?=$product['id']?>">
                            <span class="material-icons-round">add_circle</span>
                            <p>Remove</p>
                        </a>
                    </li>

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

<pre>
    <?php //$products = listProducts($db); ?>
    <?php //var_dump($products); ?>
    
</pre>