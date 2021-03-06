<?php require_once('includes/headerPanel.php') ?>
<?php 
    $userCurrent = $_SESSION['user']; // comprueba el usuario
    userRestrictions($userCurrent['position']); // restringe al usuario segun su position
?>
<?php require_once('includes/sidebarPanel.php') ?>

<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <h2>Add Users</h2>
                <?php endif; ?>
            </div>
            
            <div class="alert alert-update">
                <?php 
                if(isset($_SESSION['complete'])) :
                    echo "<div class='alert alert-complete'>{$_SESSION['complete']}</div>";?>
                <?php elseif(isset($_SESSION['errors']['general'])):
                    echo "<div class='alert alert-complete alert-save'>{$_SESSION['errors']['general']}</div>";?>
                <?php endif; ?>
            </div>

            <div class="element-container element-user">
                <div class="form-container ">
                    <form action="save-user.php" method="POST" enctype="multipart/form-data">
                        
                    <!-- NAME -->
                        <div class="form-items name">
                            <label for="name">Name</label> <br/>
                            <?php
                                //mostrar error name 
                                echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '';
                            ?>
                            <input type="text" name="name" > <br/>
                        </div>

                        <!-- LAST NAME -->
                        <div class="form-items lastname">
                            <label for="lastname" >Last Name</label><br>
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
<?php require_once('includes/footer.php') ?>