<?php require_once('includes/headerSign.php') ?>
    <main class="site-main">
        <div class="formulary">
            <!-- LOGO -->
            <div class="logo-container">
                <figure class="logo logo-sign logo-signup">
                    <img src="./assets/img/Logo.png" alt="">
                </figure>
            </div>
            <!-- TITLE: SING IN -->
            <div class="text-container text-signup">
                <h1>Sign Up</h1>
            </div>
            <!-- FORMULARY -->
            <div class="form-container">
                <form action="registre.php" method="POST">
                    <!-- NAME -->
                    <div class="form-items">
                        <label for="nombre">Name</label> <br/>
                        <input type="text" name="name" autofocus="autofocus" required="required"> <br/>
                    </div>
                    <!-- LAST NAME -->
                    <div class="form-items">
                        <label for="apellidos" >Last Name</label><br>
                        <input type="text" name="lastname" autofocus="autofocus" required="required">
                    </div>
                    <!-- Position -->
                    <div class="form-items">
                        <label for="position">Position</label><br>
                        <select name="position" id="">
                            <option value="empleado">Employed</option>
                            <option value="empleado">Boss</option>
                        </select>
                    </div>
        
                    <!-- E-MAIL -->
                    <div class="form-items">
                        <label for="email" >E-mail</label><br>
                        <input type="email" name="email" autofocus="autofocus" required="required" >
                    </div>
        
                    <!-- PASSWORD -->
                    <div class="form-items">
                        <label for="password" >Password</label><br>
                        <input type="password" name="password" autofocus="autofocus" >
                    </div>
                    
                    <div class="sessions sessions-registre">
                        <input class="btn" type="submit" value="Continue">
                    </div>
                    
                </form>
            </div>
        </div>
    </main>
<?php require_once('includes/footer.php') ?>
