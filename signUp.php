<title>Sign Up</title>
<?php require_once('includes/headerSign.php') ?>
<?php require_once('includes/helpers.php') ?>
<?php keepSession(); ?>

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
                <?php if(isset($_SESSION['complete'])) :
                    echo "<div class='alert alert-complete'> {$_SESSION['complete']}</div>"; ?>
                <?php elseif (isset($_SESSION['errors']['general'])) :
                    echo "<div class='alert alert-complete alert-save'>{$_SESSION['errors']['general']}</div>";?>
                <?php endif; ?>
                    <!-- NAME -->
                    <div class="form-items">
                        <label for="nombre">Name</label> <br/>
                        <?php
                            //mostrar error name 
                            echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '';
                        ?>
                        <input type="text" name="name" autofocus="autofocus" required="required"> <br/>
                    </div>
                    <!-- LAST NAME -->
                    <div class="form-items">
                        <label for="apellidos" >Last Name</label><br>
                        <?php
                            //mostrar error lastname 
                            echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : '';
                        ?>
                        <input type="text" name="lastname" autofocus="autofocus" required="required">
                    </div>
                    <!-- Position -->
                    <div class="form-items">
                        <label for="position">Position</label><br>
                        <?php
                            //mostrar error position 
                            echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'position') : '';
                        ?>
                        <select name="position" id="">
                            <option value="employed">Employed</option>
                            <option value="boss">Boss</option>
                        </select>
                    </div>
        
                    <!-- E-MAIL -->
                    <div class="form-items">
                        <label for="email" >E-mail</label><br>
                        <?php
                            //mostrar error email 
                            echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : '';
                        ?>
                        <input type="email" name="email" autofocus="autofocus" required="required" >
                    </div>
        
                    <!-- PASSWORD -->
                    <div class="form-items">
                        <label for="password" >Password</label><br>
                        <?php
                            //mostrar error password 
                            echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : '';
                        ?>
                        <input type="password" name="password" autofocus="autofocus" >
                    </div>
                    
                    <div class="sessions sessions-registre">
                        <input class="btn" type="submit" value="Continue">
                    </div>
                    
                </form>
                <?php eraserErrors();?>
            </div>
        </div>
    </main>
<?php require_once('includes/footer.php') ?>
