<?php require_once('includes/header.php') ?>
        <!-- MAIN -->
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
    <!-- PRODUCTOS SMARTHPHONE -->
    <div class="products-site">
        <div class="products-container">
            <!-- Unidad products -->
            <div class="products">
                <!-- name phone -->
                <p class="products-name">iPhone 12 Mini 64GB 4G</p>
                <!-- image phone -->
                <figure class="products-photo">
                    <img src="./assets/img/iphone12-red-1-lg-1@3x.png" alt="">
                </figure>
                <!-- price phone -->
                <p class="products-price">$3.746.960</p>
                <!-- botton buy -->
                <input class="btn btn-buy" type="button" value="Buy Now">
            </div>
            <div class="products">
                <p class="products-name">iPhone 12 Mini 64GB 4G</p>
                <figure class="products-photo">
                    <img src="./assets/img/iphone12-red-1-lg-1@3x.png" alt="">
                </figure>
                <p class="products-price">$3.746.960</p>
                <input class="btn btn-buy"  type="button" value="Buy Now">
            </div>
            <div class="products">
                <p class="products-name">iPhone 12 Mini 64GB 4G</p>
                <figure class="products-photo">
                    <img src="./assets/img/iphone12-red-1-lg-1@3x.png" alt="">
                </figure>
                <p class="products-price">$3.746.960</p>
                <input class="btn btn-buy" type="button" value="Buy Now">
            </div>

            <div class="products">
                <p class="products-name">iPhone 12 Mini 64GB 4G</p>
                <figure class="products-photo">
                    <img src="./assets/img/iphone12-red-1-lg-1@3x.png" alt="">
                </figure>
                <p class="products-price">$3.746.960</p>
                <input class="btn btn-buy" type="button" value="Buy Now">
            </div>

        </div>
    </div>
</main>
<?php require_once('includes/footer.php') ?>