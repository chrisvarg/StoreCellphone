<?php require_once('includes/headerPanel.php')?>
<?php require_once('includes/sidebarPanel.php')?>

<?php $user = $_SESSION['user']?>
<div class="session-container">
            <div class="session-text">
                <?php if(isset($user)):  ?>
                    <h2>My Data</h2>
                <?php endif; ?>
            </div>
            <div class="session-text message date">
                <div class="information dates">
                    <h4>Full Name</h4>
                    <p><?=$user['nombre']?></p>
                    <h4>Last Name</h4>
                    <p><?=$user['apellidos']?></p>
                </div>
                <div class="information">
                    <h4>Position</h4>
                    <p><?=$user['position']?></p>
                    <h4>Email</h4>
                    <p><?=$user['email']?></p>
                </div>
            </div>
            
            <div class="form-container">
                
                <h2>Update Data</h2>

                <form action="update-User.php" method="POST">
                <?php 
                if(isset($_SESSION['complete'])) :
                    echo "<div class='alert alert-complete'> {$_SESSION['complete']}</div>"; ?>
                <?php elseif (isset($_SESSION['errors']['general'])) :
                    echo "<div class='alert alert-complete alert-save'>{$_SESSION['errors']['general']}</div>";?>
                <?php endif; ?>
                    <!-- NAME -->
                    <div class="form-items name">
                        <label for="nombre">Name</label> <br/>
                        <?php
                            //mostrar error name 
                            echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '';
                        ?>
                        <input type="text" name="name" value="<?=$user['nombre'];?>" required="required"> <br/>
                    </div>
                    <!-- LAST NAME -->
                    <div class="form-items lastname">
                        <label for="apellidos" >Last Name</label><br>
                        <?php
                            //mostrar error lastname 
                            echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : '';
                        ?>
                        <input type="text" name="lastname" value="<?=$user['apellidos'];?>" required="required">
                    </div>
                    <!-- Position -->
                    <div class="form-items position">
                        <label for="position">Position</label><br>
                        <?php echo lockPosition();?>
                    </div>
                    
                    <!-- E-MAIL -->
                    <div class="form-items email">
                        <label for="email" >E-mail</label><br>
                        <?php
                            //mostrar error email 
                            echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : '';
                        ?>
                        <input type="email" name="email" value="<?=$user['email'];?>" required="required" >
                    </div>
                    
                    <div class="button-container">
                        <input class="button" type="submit" value="Update">
                    </div>
                    
                </form>
                
                <?php eraserErrors();?>
            </div>
            

        </div>
    </div>
</main>