<?php require_once('includes/header.php');?>
<?php require_once('includes/helpers.php') ?>
<?php require_once('includes/conexion.php') ?>

<main class="site-content">
    <!-- PORTADA -->
    <div class="cover-site">
        <!-- text of portada -->
        <div class="cover-text">
            <h1 class="cover-text__title">Smartphone Store</h1>
            <p class="cover-text__parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae quasi nesciunt molestiae enim? Atque aperiam cumque cum ab iste amet modi aliquid voluptatibus explicabo molestiae neque, officiis tenetur suscipit dolore.</p>
        </div>
    </div>
    
    <!-- MARKS -->
    <div class="marks-site">
        <!-- Containt of images -->
        <div class="marks-container">

            <!-- apple -->
            <figure class="marks-container__items apple">
                <!-- tamaños de las imagenes segun la resolución de pantalla -->
                <img srcset="./assets/img/apple.png 200w,
                                ./assets/img/apple@2x.png 600w,
                                ./assets/img/apple@3x.png 800w"
                        sizes="(min-width:375px) 375w"
                        src="./assets/img/apple.png" alt="">
            </figure>

            <!-- galaxy -->
            <figure class="marks-container__items">
                <img srcset="./assets/img/galaxy.png 200w,
                                ./assets/img/galaxy@2x.png 600w,
                                ./assets/img/galaxy@3x.png 800w"
                        src="./assets/img/galaxy.png" alt="">
            </figure>

            <!-- xiaomi -->
            <figure class="marks-container__items xiaomi">
                <img srcset="./assets/img/xiaomi.png 200w,
                                ./assets/img/xiaomi@2x.png 600w,
                                ./assets/img/xiaomi@3x.png 800w"
                        src="./assets/img/xiaomi.png" alt="">
                </figure>

                <!-- huawei -->
            <figure class="marks-container__items">
                <img srcset="./assets/img/huawei.png 200w,
                             ./assets/img/huawei@2x.png 600w,
                             ./assets/img/huawei@3x.png 800w"
                        src="./assets/img/huawei.svg" alt="">
            </figure>
        </div>
    </div>
    <div class="products-site">
        <h1>Welcome to Our Store</h1>
        <div class="products-container">
            <!-- Unidad products -->
            <?php 
                $products = listElements($db, 'productos');
                if (! empty($products)):
                    while ($product = mysqli_fetch_assoc($products)):
            ?>
                        <div class="products">
                            <!-- name phone -->
                            <p class="products-name"><?=$product['nombre']?></p>
                            <!-- image phone -->
                            <figure class="products-photo">
                                <img src="./products/<?=$product['imagen']?>" alt="">
                            </figure>
                            <!-- price phone -->
                            <p class="products-price">$ <?=number_format($product['precio'], 0, ',', '.')?></p>
                            <!-- botton buy -->
                            <div class="btn btn-buy" type="button" value="Buy Now">
                                <a href="./details-product.php?id=<?=$product['id']?>">Buy Now</a>
                            </div>
                        </div>
                    <?php endwhile;?>
                <?php endif;?>
        </div>
    </div>
</main>

<?php require_once('includes/footer.php')?>