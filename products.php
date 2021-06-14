<?php require_once('includes/headerPanel.php'); ?>
<?php require_once('includes/sidebarPanel.php'); ?>

<div class="session-container">
            <div class="session-text">
                    <h2>Products</h2>
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
                        <?php $products = listElements($db, 'productos' ,true);
                        // mysqli_num_rows()
                            if(!empty($products)) :
                                while($product = mysqli_fetch_assoc($products)): 
                        ?>
                                    <tr>
                                        <td><a href="product.php?id=<?=$product['id'];?>">Details</a></td>
                                        <td><?=$product['id'];?></td>
                                        <td><?=$product['nombre'];?></td>
                                        <td><?=$product['marca']?></td>
                                        <td>$ <?=number_format($product['precio'], 0, ',', '.')?></td>
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
                        <a class="add" href="all-products.php">
                            <p>See More</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="table-container">
                <h2>List Users</h2>
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
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Iphone 13 blablabla</td>
                            <td>Apple</td>
                            <td>$ 3.746.960</td>
                            <td>
                                <a href="./assets/img/iphone12-red-1-lg-1@3x.png">
                                    <figure>
                                        <img src="./assets/img/iphone12-red-1-lg-1@3x.png" alt="">
                                    </figure>
                                    
                                </a>
                            </td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Iphone 13 blablabla</td>
                            <td>Apple</td>
                            <td>$ 3.746.960</td>
                            <td>
                                <a href="./assets/img/iphone12-red-1-lg-1@3x.png">
                                    <figure>
                                        <img src="./assets/img/iphone12-red-1-lg-1@3x.png" alt="">
                                    </figure>
                                    
                                </a>
                            </td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Iphone 13 blablabla</td>
                            <td>Apple</td>
                            <td>$ 3.746.960</td>
                            <td>
                                <a href="./assets/img/iphone12-red-1-lg-1@3x.png">
                                    <figure>
                                        <img src="./assets/img/iphone12-red-1-lg-1@3x.png" alt="">
                                    </figure>
                                    
                                </a>
                            </td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Iphone 13 blablabla</td>
                            <td>Apple</td>
                            <td>$ 3.746.960</td>
                            <td>
                                <a href="./assets/img/iphone12-red-1-lg-1@3x.png">
                                    <figure>
                                        <img src="./assets/img/iphone12-red-1-lg-1@3x.png" alt="">
                                    </figure>
                                    
                                </a>
                            </td>
                            <td>3</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</main>
<?php require_once('includes/footer-admin.php') ?>