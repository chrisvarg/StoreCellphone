<?php require_once('./includes/headerPanel.php'); ?>
<?php require_once('./includes/sidebarPanel.php'); ?>
<!-- <pre> -->


<!-- </pre> -->
<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <h2>Add Products</h2>

                <?php endif; ?>
            </div>
            
            <div class="buttons">
                <ul class="buttons-container">
                    <li class="btn">
                        <a class="add" href="add-product.php">
                            <span class="material-icons-round">add_circle</span>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="btn">
                        <a class="remove" href="">
                            <span class="material-icons-round">add_circle</span>
                            <p>Remove</p>
                        </a>
                    </li>
                    <li class="btn">
                        <a class="update" href="">
                            <span class="material-icons-round">add_circle</span>
                            <p>Update</p>
                        </a>
                    </li>
                </ul>
            </div>
    
            <div class="form-container ">
                
                <h2 class="products-add">Add Products</h2>

                <form action="save-Product.php" method="POST" enctype="multipart/form-data">

                    <?php if(isset($_SESSION['complete'])) :
                        echo "<div class='alert alert-complete'> {$_SESSION['complete']}</div>"; ?>
                    <?php elseif (isset($_SESSION['errorsProducts']['save'])) :
                        echo "<div class='alert alert-complete alert-save'>{$_SESSION['errorsProducts']['save']}</div>";?>

                    <?php endif; ?>
                    <!-- NAME -->
                    <div class="form-items">
                        <label for="nombre">Name</label><br>
                        <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'name') : '' ;?>

                        <input type="text" name="nombre" autofocus="autofocus""> <br/>
                    </div>

                    <!-- BRAND -->
                    <div class="form-items">
                        <label for="marca" >Brand</label><br>
                        <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'marca') : '' ;?>

                        <input type="text" name="marca" autofocus="autofocus"">
                    </div>

                    <!-- PRICE -->
                    <div class="form-items">
                        <label for="precio" >Price</label><br>
                        <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'precio') : '' ;?>

                        <input type="number" name="precio" autofocus="autofocus"">
                    </div>

                    <!-- IMAGE -->
                    <div class="form-items">
                        <label for="imagen">Image</label><br>
                        <input type="file" name="imagen" required="required">
                    </div>
        
                    <!-- STOCK -->
                    <div class="form-items">
                        <label for="stock" >Stock</label><br>
                        <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'stock') : '' ;?>
                        
                        <input type="number" name="stock" autofocus="autofocus"" >
                    </div>

                    <!-- DECRIPTION -->
                    <div class="form-items">
                        <label for="description" >Description</label><br>
                        <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'description') : '' ;?>

                        <textarea name="description" id="" cols="30" rows="10"></textarea>
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
</main>
