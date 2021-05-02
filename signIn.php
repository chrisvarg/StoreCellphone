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
            <div class="form-container">
                <form action="login.php" method="GET">
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
            
                    <!-- BUTTOMS -->
                    <div class="sessions sessions-registre">
                        <input class="btn" id="signin" type="submit" value="Continue">
                    </div>
                    
                </form>
                <a href="./signUp.php" class="signup">
                    <input class="btn" type="submit" value="Sign Up">
                </a>
            </div>
        </div>
    </main>
<?php require_once('includes/footer.php') ?>
