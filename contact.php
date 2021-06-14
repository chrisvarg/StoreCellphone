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
    
        <div class="formulary">
            <!-- TITLE: SING IN -->
            <div class="text-container text-signup">
                <h1>Contact</h1>
            </div>
            <!-- LOGO -->
            <div class="logo-container">
                <figure class="logo logo-sign logo-signup">
                    <img src="https://image.freepik.com/foto-gratis/mujer-escribiendo-cuaderno_1150-160.jpg" alt="">
                </figure>
            </div>

            <!-- FORMULARY -->
            <div class="form-container">

                <form action="" method="POST">

                    <!-- NAME -->
                    <div class="form-items">
                        <label for="nombre">Name</label> <br/>
                        <input type="text" name="name" autofocus="autofocus" required="required"> <br/>
                    </div>

                    <!-- E-MAIL -->
                    <div class="form-items">
                        <label for="email" >E-mail</label><br>
                        <input type="email" name="email" autofocus="autofocus" required="required" >
                    </div>

                    <!-- Message -->
                    <div class="form-items">
                        <label for="message" >Message</label><br>
                        <textarea name="message" id="" cols="30" rows="10"></textarea>
                    </div>
                    
                    
                    <div class="sessions sessions-registre">
                        <input class="btn" type="submit" value="Continue">
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>

<?php require_once('includes/footer.php')?>

