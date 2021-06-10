<?php require_once('./includes/headerPanel.php'); ?>
<?php require_once('./includes/sidebarPanel.php'); ?>
<?php $user = $_SESSION['user'];?>

<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <h2>Add Customers</h2>

                <?php endif; ?>
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
                <div class="form-container ">
                    <form action="save-customer.php" method="POST" enctype="multipart/form-data">
                        <!-- NAME -->
                        <div class="form-items">
                            <label for="name">Name</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '' ;?>

                            <input type="text" name="name" autofocus="autofocus""> <br/>
                        </div>

                        <!-- BRAND -->
                        <div class="form-items">
                            <label for="lastName" >Last Name</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : '' ;?>

                            <input type="text" name="lastname" autofocus="autofocus"">
                        </div>

                        <!-- PRODUCT -->
                        <div class="form-items">
                            <label for="product" >Product</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'idProduct') : '' ;?>
                            <select name="product">
                                <?php
                                    $products = listElements($db, 'productos');
                                    if(! empty($products)) :
                                        while ($product = mysqli_fetch_assoc($products)):
                                ?>
                                                <option value="<?=$product['id']?>"><?=$product['nombre']?></option>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <option name="product" disabled>
                                        </option>
                                    <?php endif; ?>
                            </select>
                            <input type="hidden" name="user" value="<?=$user['id']?>">
                        </div>
            
                        <!-- DOCUMENT -->
                        <div class="form-items">
                            <label for="document" >Document</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'document') : '' ;?>                            
                            <input type="number" name="document" autofocus="autofocus"" >
                        </div>

                        <!-- ADDRESS -->
                        <div class="form-items">
                            <label for="address" >Address</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'address') : '' ;?>                            
                            <input type="text" name="address" autofocus="autofocus"" >
                        </div>

                        <!-- CONTACT -->
                        <div class="form-items">
                            <label for="contact" >Contact</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'contact') : '' ;?>                            
                            <input type="number" name="contact" autofocus="autofocus"" >
                        </div>

                        <!-- EMAIL -->
                        <div class="form-items">
                            <label for="email" >E-mail</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : '' ;?>                            
                            <input type="email" name="email" autofocus="autofocus"" >
                        </div>

                        <div class="button-container">
                            <input class="button" type="submit" value="Continue">
                        </div>
                    </form>
                    <!-- aqui -->
                    <?php eraserErrors();?>
                </div>
            </div>
        </div>
    </div>
</main>
