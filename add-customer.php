<?php require_once('./includes/headerPanel.php'); ?>
<?php require_once('./includes/sidebarPanel.php'); ?>
<!-- <pre> -->
<?php
$user = $_SESSION['user'];
// var_dump($user);
// die();
?>

<!-- </pre> -->
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

                        <div class="form-items">
                            <label for="product" >Product</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'idProduct') : '' ;?>

                                <?php
                                    $products = listElements($db, 'productos');
                                    if(! empty($products)) :
                                        while ($product = mysqli_fetch_assoc($products)):
                                ?>
                                    <select name="product">
                                        <option value="<?=$product['id']?>"><?=$product['nombre']?></option>
                                    </select>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                    <select name="product" disabled>
                                    </select>
                                    <?php endif; ?>
                            <input type="hidden" name="user" value="<?=$user['id']?>">

                        </div>
            
                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="document" >Document</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'document') : '' ;?>
                            
                            <input type="number" name="document" autofocus="autofocus"" >
                        </div>
                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="address" >Address</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'address') : '' ;?>
                            
                            <input type="text" name="address" autofocus="autofocus"" >
                        </div>
                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="contact" >Contact</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'contact') : '' ;?>
                            
                            <input type="number" name="contact" autofocus="autofocus"" >
                        </div>
                        <!-- STOCK -->
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
