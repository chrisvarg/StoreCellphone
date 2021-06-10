<?php require_once('includes/headerPanel.php'); ?>
<?php require_once('includes/sidebarPanel.php'); ?>

<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <h2>All Products</h2>

                <?php endif; ?>
            </div>
            
            <div class="buttons">
                <ul class="buttons-container btn-add">
                    <li class="btn">
                        <a class="add" href="add-product.php">
                            <span class="material-icons-round">add_circle</span>
                            <p>Add</p>
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="table-container">
                <table class="show-table" >
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $products = listElements($db, 'productos');
                        
                            if(!empty($products)) :
                                while($product = mysqli_fetch_assoc($products)): 
                        ?>
                                    <tr>
                                        <td><a href="product.php?id=<?=$product['id'];?>">Details</a></td>
                                        <td><?=$product['id'];?></td>
                                        <td><?=$product['nombre']?></td>
                                        <td><?=$product['marca']?></td>
                                        <td>$ <?=number_format($product['precio'], 0, ',', '.')?></td>
                                        <td>
                                            <a href="./products/<?=$product['imagen']?>" target="_blank">
                                                <figure>
                                                    <img src="./products/<?=$product['imagen']?>" alt="">
                                                </figure>
                                            </a>
                                        </td>
                                        <td><?=$product['stock']. ' units'?></td>
                                    </tr>
                        <?php 
                                endwhile;
                            endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>