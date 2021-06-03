<?php require_once('includes/headerPanel.php'); ?>
<?php require_once('includes/sidebarPanel.php'); ?>

<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <h2>Products</h2>

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
            
            <div class="table-container">
                <h2>latest products</h2>
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
                        <?php $products = listProducts($db);
                        
                            if(!empty($products)) :
                                while($product = mysqli_fetch_assoc($products)): 
                        ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="" id="">
                                        </td>
                                        <td><?=$product['id'];?></td>
                                        <td><?=$product['nombre']?></td>
                                        <td><?=$product['marca']?></td>
                                        <td><?='$ '.number_format($product['precio'], 0, ',', '.')?></td>
                                        <td>
                                            <a href="./products/<?=$product['imagen']?>" target="_blank">
                                                <figure>
                                                    <img src="./products/<?=$product['imagen']?>" alt="">
                                                </figure>
                                            </a>
                                            <!-- // -->
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
            <div class="buttons button-see">
                <ul class="buttons-container see">
                    <li class="btn">
                        <a class="add" href="add-product.php">
                            <p>Read More</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</main>

<pre>
    <?php //$products = listProducts($db); ?>
    <?php //var_dump($products); ?>
    
</pre>