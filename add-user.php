<?php require_once('includes/headerPanel.php') ?>
<?php 
    $user = $_SESSION['user']; // comprueba el usuario
    userRestrictions($user['position']); // restringe al usuario segun su position
    
    // consulta el usuario que llega por get
    $userCurrent = user($db, $_GET['id']);
    // demuestra si el usuario existe 
    $existe = userExist($db, $_GET['id']);
    
?>
<?php require_once('includes/sidebarPanel.php') ?>
<pre>
</pre>

<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <h2>Add Users</h2>

                <?php endif; ?>
            </div>
            
            <div class="element-container element-user">

                <div class="form-container ">

                        <div class="alert">
                            <?php 
                            if(isset($_SESSION['complete'])) :
                                echo "<div class='alert alert-complete'>{$_SESSION['complete']}</div>";?>
                            <?php elseif(isset($_SESSION['errors']['general'])):
                                echo "<div class='alert alert-complete alert-save'>{$_SESSION['errors']['general']}</div>";?>
                            <?php endif; ?>
                        </div>
                    <form action="save-user.php" method="POST" enctype="multipart/form-data">
                        <!-- NAME -->
                        <div class="form-items name">
                            <label for="nombre">Name</label> <br/>
                            <?php
                                //mostrar error name 
                                echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '';
                            ?>
                            <input type="text" name="name" > <br/>
                        </div>
                        <!-- LAST NAME -->
                        <div class="form-items lastname">
                            <label for="apellidos" >Last Name</label><br>
                            <?php
                                //mostrar error lastname 
                                echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : '';
                            ?>
                            <input type="text" name="lastname">
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
                            <input type="email" name="email" >
                        </div>
                        
                        <div class="form-items">
                            <label for="password" >Password</label><br>
                            <?php
                                //mostrar error password 
                                echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : '';
                            ?>
                            <input type="password" name="password" autofocus="autofocus" >
                        </div>
                        <div class="button-container">
                            <input class="button" type="submit" value="Update">
                        </div>
                        
                    </form>
                    <!-- aqui -->
                    <?php eraserErrors();?>
                </div>
            </div>
        </div>
    </div>
</main>