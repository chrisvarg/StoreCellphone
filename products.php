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
                        <a class="add" href="">
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