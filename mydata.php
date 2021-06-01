<?php require_once('includes/headerPanel.php')?>
<?php require_once('includes/sidebarPanel.php')?>

<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <?php echo "<h2>Welcolme {$_SESSION['user']['nombre']} {$_SESSION['user']['apellidos']}</h2>"; ?>
                    
                <?php else: ?>
                    <?php echo "<p>Error Login</p>"; ?>
                <?php endif; ?>
            </div>
            <div class="session-text message">
                <h3>Name</h3>
                <h3>Last Name</h3>
                <h3>Name</h3>
                <h3>Position</h3>
                <h3>Email</h3>
            </div>
            
            <div class="form-container">

                <form action="registre.php" method="POST">
                <?php if(isset($_SESSION['complete'])) :
                    echo "<div class='alert alert-complete'> {$_SESSION['complete']}</div>"; ?>
                <?php elseif (isset($_SESSION['errors']['general'])) :
                    echo "<div class='alert alert-complete'>{$_SESSION['errors']['general']}</div>";?>
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

            <div class="prices">
                <div class="prices-container">
                    <div class="prices-tittle">
                        <h2>sold products</h2>    
                    </div>
                    <div class="session-text price-text">
                        <?php $product = lastProduct($db);?>
                        <h4><?=$product['nombre']?></h4>
                    </div>
                </div>
                <div class="prices-container">
                    <div class="prices-tittle">
                        <h2>Total Sale</h2>    
                    </div>
                    <div class="session-text price-text">
                        <?php $users = numberUsers($db);?>
                        <h4>$ <?=number_format($product['precio'], 0, ',', '.')?></h4>
                    </div>
                </div>
                <div class="prices-container">
                    <div class="prices-tittle">
                        <h2>Users</h2>    
                    </div>
                    <div class="session-text price-text">
                        <h3><?=$users['total']?></h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>