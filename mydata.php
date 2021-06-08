<?php require_once('includes/headerPanel.php')?>
<?php require_once('includes/sidebarPanel.php')?>

<?php if ($user = $_SESSION['user']):?>
    <?php $user = user($db, $user['id']);?>
    <?php endif;?>

<div class="session-container">
            <div class="session-text">
                    <h2>My Data</h2>
            </div>
            
            <div class="alert alert-update">
                <?php 
                    if(isset($_SESSION['complete'])) :
                        echo "<div class='alert alert-complete'> {$_SESSION['complete']}</div>"; ?>
                    <?php elseif (isset($_SESSION['errors']['general'])) :
                        echo "<div class='alert alert-complete alert-save'>{$_SESSION['errors']['general']}</div>";?>
                    <?php endif; ?>
            </div>
            <div class="element-container element-user">
                <div class="element-image">
                    <figure >
                        <img class="element-profile" src="./users/<?=$user['imagen']?>" alt="">
                    </figure>
                    <pre>
                    
                    <?php 
                        // var_dump($user);
                        // die();
                    ?>
                    </pre>
                </div>
                <div class="session-text message element-text">
                    <div class="information dates element-text__date">
                        <h4>Id: <span><?=$user['id']?></span></h4>
                        <h4>Name: <span><?=$user['nombre']?></span></h4>
                        <h4>Last Name: <span><?=$user['apellidos']?></span></h4>
                        <h4>Position: <span><?=$user['position']?></span></h4>
                        <h4>E-mail: <span><?=$user['email']?></span></h4>
                        <h4>fecha: <span><?=$user['fecha']?></span></h4>
                    </div>    
                </div>
            </div>
            
            <div class="form-container">
                
                <h2>Update Data</h2>

                <form action="update-mydata.php" method="POST" enctype="multipart/form-data">
                    <?php 
                    if(isset($_SESSION['errors']['general'])) :
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
                    <!-- IMAGE -->
                    <div class="form-items">
                        <label for="imagen">Image</label><br>
                        <input type="file" name="imagen" value="<?=$user['imagen']?>" >
                    </div>
                    <input type="hidden" name="nameImage" value="<?=$user['imagen']?>">
                    
                    <div class="button-container">
                        <input class="button" type="submit" value="Update">
                    </div>
                    
                </form>
                
                <?php eraserErrors();?>
            </div>
            

        </div>
    </div>
</main>