<?php require_once('includes/headerPanel.php'); ?>

<?php 
    $product = product($db, $_GET['id']);
    $existe = productExist($db, $_GET['id']);
    var_dump($existe);
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
                        <?php elseif (isset($_SESSION['errorsProducts']['save'])) :
                            echo "<div class='alert alert-complete alert-save'>{$_SESSION['errorsProducts']['save']}</div>";?>

                        <?php endif; ?>
                        <!-- NAME -->
                        <div class="form-items">
                            <label for="nombre">Name</label><br>
                            <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'name') : '' ;?>

                            <input type="text" name="nombre" autofocus="autofocus" value="<?=$product['nombre']?>"><br/>
                        </div>

                        <!-- BRAND -->
                        <div class="form-items">
                            <label for="marca" >Brand</label><br>
                            <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'marca') : '' ;?>

                            <input type="text" name="marca" autofocus="autofocus" value="<?=$product['marca']?>">
                        </div>

                        <!-- PRICE -->
                        <div class="form-items">
                            <label for="precio" >Price</label>
                            <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'precio') : '' ;?>

                            <input type="number" name="precio" autofocus="autofocus" value="<?=$product['precio']?>">
                        </div>

                        <!-- IMAGE -->
                        <div class="form-items">
                            <label for="imagen">Image</label><br>
                            <input type="file" name="imagen" value="<?=$user['imagen']?>">
                        </div>
                        <input type="hidden" name="nameImage" value="<?=$product['imagen']?>">

                        <!-- STOCK -->
                        <div class="form-items">
                            <label for="stock" >Stock</label><br>
                            <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'stock') : '' ;?>
                            
                            <input type="number" name="stock" autofocus="autofocus" value="<?=$product['stock']?>" >
                        </div>

                        <!-- DECRIPTION -->
                        <div class="form-items update-description">
                            <label for="description" >Description</label><br>
                            <?php echo isset($_SESSION['errorsProducts']) ? showErrors($_SESSION['errorsProducts'], 'description') : '' ;?>

                            <textarea name="description" id="" cols="30" rows="10" ><?=$product['description']?></textarea>
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

                <!-- <div class="product-image update-image">
                    <figure>
                        <img src="./products/<?=$product['imagen']?>" alt="">
                    </figure>
                </div> -->
                
                
            

            </div>

        
        </div>
    </div>
</main>