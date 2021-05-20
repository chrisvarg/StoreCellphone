<?php require_once('includes/headerSign.php') ?>
    <main class="site-main ">
        <div class="formulary">
            <!-- LOGO -->
            <div class="logo-container">
                <figure class="logo logo-sign">
                    <img src="./assets/img/Logo.png" alt="">
                </figure>
            </div>
            <!-- TITLE: SING IN -->
            <div class="text-container">
                <h1>Sign In</h1>
            </div>
            <!-- FORMULARY -->
            <!-- (tener en cuenta el if para hacer y maquetar la interfaz de los que se logean) -->
            <div id="login-user">
            <?php if(isset($_SESSION['user'])):  ?>
                <?php echo "<p>{$_SESSION['user']['nombre']} {$_SESSION['user']['apellidos']}</p>"; ?>
            <?php endif; ?>
            
            <!-- error si no hay sessión user -->
            <?php if(isset($_SESSION['error-login'])):  ?>
            <div class="alert alert-error">
                <?=$_SESSION['error-login']; ?>
            </div>
            <?php endif; ?>
            </div>
            
            <div class="form-container">
                <form action="login.php" method="POST">
                    <!-- EMAIL -->
                    <div class="form-items">
                        <label for="email">E-mail</label> <br/>
                        <input type="email" name="email" autofocus="autofocus" required="required"> <br/>
                    </div>
                    <!-- PASSWORD -->
                    <div class="form-items">
                        <label for="password" >Password</label><br>
                        <input type="password" name="password" autofocus="autofocus" >
                    </div>
            
                    <!-- BUTTOM CONTINUE -->
                    <div class="sessions sessions-registre">
                        <input class="btn" id="signin" type="submit" value="Continue">
                    </div>
                    
                </form>
                <!-- BUTTOM SINGUP -->
                <a href="./signUp.php" class="signup">
                    <input class="btn" type="submit" value="Sign Up">
                </a>
            </div>
        </div>
    </main>
<?php require_once('includes/footer.php') ?>
