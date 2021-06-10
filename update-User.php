<?php require_once('includes/headerPanel.php'); ?>
<?php 
    $user = element($db, $_GET['id'], 'usuarios');
    $exist = elementExist($db, $_GET['id'], 'usuarios');
    
?>
<?php require_once('includes/sidebarPanel.php'); ?>

<div class="session-container">
            <div class="session-text">
                <?php if ($_SESSION['user']):?>
                    <h2><?=$user['nombre']?> <?=$user['apellidos']?></h2>
                <?php endif;?>
            </div>
            
            <div class="prices-tittle update-tittle">
                <h2 class="products-add">Update User</h2>
            </div>
            
            <div class="product-container product-update">
                <div class="form-container update-form">
                    <form action="edit-user.php?id=<?=$user['id']?>" method="POST" enctype="multipart/form-data">
                        
                        <?php 
                        if(isset($_SESSION['complete'])) :
                            echo "<div class='alert alert-complete'> {$_SESSION['complete']}</div>"; ?>
                        <?php elseif (isset($_SESSION['errors']['general'])) :
                            echo "<div class='alert alert-complete alert-save'>{$_SESSION['errors']['general']}</div>";?>
                        <?php endif; ?>
                        
                        <!-- NAME -->
                        <div class="form-items name">
                            <label for="name">Name</label> <br/>
                            <?php
                                //mostrar error name 
                                echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '';
                            ?>
                            <input type="text" name="name" value="<?=$user['nombre'];?>" required="required"> <br/>
                        </div>

                        <!-- LASTNAME -->
                        <div class="form-items name">
                            <label for="lastname">Last Name</label> <br/>
                            <?php
                                //mostrar error name 
                                echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : '';
                            ?>
                            <input type="text" name="lastname" value="<?=$user['apellidos'];?>" required="required"> <br/>
                        </div>

                        <!-- POSITION -->
                        <div class="form-items name">
                            <label for="position">Position</label> <br/>                            
                            <?php
                                //mostrar error name 
                                echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'position') : '';
                            ?>
                            <?php if ($user['position'] == 'boss'):?>
                                    <select name="position">
                                        <option value="employed"><?=ucfirst($user['position']);?></option>
                                        <option value="employed">Employed</option>
                                    </select>
                                
                                <?php elseif ($user['position'] == 'employed'):?>
                                    <select name="position">
                                        <option value="employed"><?=ucfirst($user['position']);?></option>
                                        <option value="employed">Boss</option>
                                    </select>
                            <?php endif?>
                        </div>

                        <!-- EMAIL -->
                        <div class="form-items name">
                            <label for="email">E-mail</label> <br/>
                            <?php
                                //mostrar error name 
                                echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : '';
                            ?>
                            <input type="email" name="email" value="<?=$user['email'];?>" required="required"> <br/>
                        </div>

                        <!-- IMAGE -->
                        <div class="form-items name">
                            <label for="image">Image</label> <br/>
                            <input type="file" name="image" value="<?=$user['imagen'];?>"> <br/>
                            <input type="hidden" name="nameImage" value="<?=$user['imagen']?>">
                        </div>

                        <div class="button-container">
                            <div class="buttons button-see">
                                <input class="button" type="submit" value="Continue">
                            </div>
                        </div>
                    </form>
                        <!-- aqui -->
                        <?php eraserErrors();?>
                </div>
            </div>
        
        </div>
    </div>
</main>