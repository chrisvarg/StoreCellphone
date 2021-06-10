<?php require_once('includes/headerPanel.php'); ?>

<?php 
    $customer = element($db, $_GET['id'], 'clientes');
    $existe = elementExist($db, $_GET['id'], 'clientes');
    $user = $_SESSION['user'];
?>


<?php require_once('includes/sidebarPanel.php'); ?>

<div class="session-container">
            <div class="session-text">
                <?php if ($_SESSION['user']):?>
                    <h2><?=$customer['nombre']?></h2>
                <?php endif;?>
            </div>
            
            <div class="prices-tittle update-tittle">
                <h2 class="customers-add">Update customer</h2>
            </div>
            
            <div class="customer-container customer-update">

                <div class="form-container update-form">

                    <form action="edit-customer.php?id=<?=$customer['id']?>" method="POST" enctype="multipart/form-data">
                        <!-- NAME -->
                        <div class="form-items">
                            <label for="name">Name</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '' ;?>

                            <input type="text" name="name" value="<?=$customer['nombre']?>" autofocus="autofocus""> <br/>
                        </div>

                        <!-- BRAND -->
                        <div class="form-items">
                            <label for="lastName" >Last Name</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : '' ;?>

                            <input type="text" name="lastname" value="<?=$customer['apellidos']?>" autofocus="autofocus"">
                        </div>

                        <div class="form-items">
                            <label for="product" >Product</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'idcustomer') : '' ;?>

                            <select name="product">
                                <?php
                                    $products = listElements($db, 'productos');
                                    if(! empty($products)) :
                                        while ($product = mysqli_fetch_assoc($products)):
                                ?>          
                                            
                                                <option value="<?=$product['id']?>"><?=$product['nombre']?></option>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <option value="0" disabled>There are no products </option>
                                    <?php endif; ?>
                            </select>
                            <input type="hidden" name="user" value="<?=$customer['id_usuario']?>">

                        </div>
            
                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="document" >Document</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'document') : '' ;?>
                            
                            <input type="number" name="document" value="<?=$customer['documento']?>" autofocus="autofocus"" >
                        </div>
                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="address" >Address</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'address') : '' ;?>
                            
                            <input type="text" name="address" value="<?=$customer['direccion']?>" autofocus="autofocus"" >
                        </div>
                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="contact" >Contact</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'contact') : '' ;?>
                            
                            <input type="number" name="contact" value="<?=$customer['telefono']?>" autofocus="autofocus"" >
                        </div>
                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="email" >E-mail</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : '' ;?>
                            
                            <input type="email" name="email" value="<?=$customer['email']?>" autofocus="autofocus"" >
                        </div>

                        <div class="button-container">
                            <input class="button" type="submit" value="Continue">
                        </div>
                        
                    </form>
                    <!-- aqui -->
                <?php eraserErrors();?>
                </div>

                <!-- <div class="customer-image update-image">
                    <figure>
                        <img src="./customers/<?=$customer['imagen']?>" alt="">
                    </figure>
                </div> -->
                
                
            

            </div>

        
        </div>
    </div>
</main>