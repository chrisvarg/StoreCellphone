<?php require_once('includes/headerPanel.php'); ?>
<?php 
    $product = element($db, $_GET['id'], 'productos');
    $exist = elementExist($db, $_GET['id'], 'productos');
?>
<?php require_once('includes/sidebarPanel.php'); ?>

<div class="session-container">
            <div class="session-text">
                <?php if ($_SESSION['user']):?>
                    <h2><?=$product['nombre']?></h2>
                <?php endif;?>
            </div>
            
            <div class="prices-tittle update-tittle">
                <h2 class="products-add">Update Product</h2>
            </div>
            
            <div class="product-container product-update">
                <div class="form-container update-form">
                    <form action="edit-product.php?id=<?=$product['id']?>" method="POST" enctype="multipart/form-data">

                        <?php if(isset($_SESSION['complete'])) :
                            echo "<div class='alert alert-complete'>{$_SESSION['complete']}</div>"; ?>
                        <?php elseif (isset($_SESSION['errors']['general'])) :
                            echo "<div class='alert alert-complete alert-save'>{$_SESSION['errors']['general']}</div>";?>
                        <?php endif; ?>

                        <!-- NAME -->
                        <div class="form-items">
                            <label for="name">Name</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '' ;?>
                            <input type="text" name="name" autofocus="autofocus" value="<?=$product['nombre']?>"><br/>
                        </div>

                        <!-- BRAND -->
                        <div class="form-items">
                            <label for="brand" >Brand</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'brand') : '' ;?>
                            <input type="text" name="brand" autofocus="autofocus" value="<?=$product['marca']?>">
                        </div>

                        <!-- PRICE -->
                        <div class="form-items">
                            <label for="price" >Price</label>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'price') : '' ;?>
                            <input type="number" name="price" autofocus="autofocus" value="<?=$product['precio']?>">
                        </div>

                        <!-- IMAGE -->
                        <div class="form-items">
                            <label for="image">Image</label><br>
                            <input type="file" name="image" value="<?=$user['imagen']?>">
                        </div>
                        <input type="hidden" name="nameImage" value="<?=$product['imagen']?>">

                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="stock" >Stock</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'stock') : '' ;?>
                            <input type="number" name="stock" autofocus="autofocus" value="<?=$product['stock']?>" >
                        </div>

                        <!-- DECRIPTION -->
                        <div class="form-items update-description">
                            <label for="description" >Description</label><br>
                            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'description') : '' ;?>
                            <textarea name="description" id="" cols="30" rows="10" ><?=$product['description']?></textarea>
                        </div>
                        
                        <div class="button-container">
                            <div class="">
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
<?php require_once('includes/footer-admin.php') ?>