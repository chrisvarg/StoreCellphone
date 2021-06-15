<?php require_once('./includes/headerPanel.php'); ?>
<?php require_once('./includes/sidebarPanel.php'); ?>

<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <h2>Add Products</h2>
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
                    <form action="save-Product.php" method="POST" enctype="multipart/form-data">

                        <!-- NAME -->
                        <div class="form-items">
                            <label for="name">Name</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '' ;?>
                            <input type="text" name="name" autofocus="autofocus""> <br/>
                        </div>

                        <!-- BRAND -->
                        <div class="form-items">
                            <label for="brand" >Brand</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'brand') : '' ;?>
                            <input type="text" name="brand" autofocus="autofocus"">
                        </div>

                        <!-- PRICE -->
                        <div class="form-items">
                            <label for="price" >Price</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'price') : '' ;?>
                            <input type="number" name="price" autofocus="autofocus"">
                        </div>

                        <!-- IMAGE -->
                        <div class="form-items">
                            <label for="image">Image</label><br>
                            <input type="file" name="image" required="required">
                        </div>
            
                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="stock" >Stock</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'stock') : '' ;?>
                            <input type="number" name="stock" autofocus="autofocus"" >
                        </div>

                        <!-- DECRIPTION -->
                        <div class="form-items update-description">
                            <label for="description" >Description</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'description') : '' ;?>
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
    </div>
</main>
<?php require_once('includes/footer.php') ?>