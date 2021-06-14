<?php require_once('includes/header.php') ?>
<?php require_once('includes/helpers.php') ?>
<?php require_once('includes/conexion.php') ?>

<?php 
    $product = element($db, $_GET['id'], 'productos');
    $exist = existeProduct($db, $_GET['id'], 'productos');
?>


<main class="site-content">
    <!-- PORTADA -->
    <div class="cover-site">
        <!-- text of portada -->
        <div class="cover-text">
            <h1 class="cover-text__title">Smartphone Store</h1>
            <p class="cover-text__parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae quasi nesciunt molestiae enim? Atque aperiam cumque cum ab iste amet modi aliquid voluptatibus explicabo molestiae neque, officiis tenetur suscipit dolore.</p>
        </div>
    </div>
    
    <div class="products-site">
        <h1><?=$product['nombre']?></h1>
        <div class="session-container">

            <div class="element-container">
                <div class="element-image">
                    <figure>
                        <img src="./products/<?=$product['imagen']?>" alt="">
                    </figure>
                </div>

                <div class="session-text message element-text">
                    <div class="information dates element-text__date">
                        <h4>Name: <span><?=$product['nombre']?></span></h4>
                        <h4>Brand: <span><?=$product['marca']?></span></h4>
                        <h4>Price: <span>$ <?=number_format($product['precio'], 0, ',', '.')?></span></h4>
                        <h4>Description: </h4>
                        <br>
                        <p><?=$product['description']?></p>
                    </div>    
                </div>
            </div>

        </div>
    </div>
    <?php eraserErrors();?>
    </div>
</main>

<?php require_once('includes/footer.php')?>