<?php require_once('includes/headerPanel.php')?>
<?php require_once('includes/sidebarPanel.php')?>

<div class="session-container">
            <div class="session-text">
                    <h2>Customers</h2>
            </div>
<<<<<<< HEAD
            <div class="buttons">
                <ul class="buttons-container">
                    <li class="btn">
                        <a class="add" href="">
=======
            
            <div class="buttons">
                <ul class="buttons-container btn-add">
                    <li class="btn">
                        <a class="add" href="add-customer.php">
>>>>>>> aplication
                            <span class="material-icons-round">add_circle</span>
                            <p>Add</p>
                        </a>
                    </li>
<<<<<<< HEAD
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
                    
=======
>>>>>>> aplication
                </ul>
            </div>
            
            <div class="table-container">
<<<<<<< HEAD
                <h2>List Users</h2>
=======
                <h2>Lastest Customers</h2>
>>>>>>> aplication
                <table class="show-table" >
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
<<<<<<< HEAD
                            <th>User</th>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Last Name</th>
=======
                            <th>Full Name</th>
                            <th>Product</th>
>>>>>>> aplication
                            <th>Document</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $customers = listElements($db, 'clientes', true); 
                            if(! empty($customers)):
                                while($customer = mysqli_fetch_assoc($customers)):
                        ?>  
                                <tr>
                                    <td>
                                        <a href="customer.php?id=<?=$customer['id'];?>">Details</a></td>
                                    </td>
                                    <td><?=$customer['id']?></td>
                                    <td><?=$customer['nombre']?> <?=$customer['apellidos']?></td>
                                    <td><?=$customer['producto']?></td>
                                    <td><?=$customer['documento']?></td>
                                    <td><?=$customer['direccion']?></td>
                                    <td><?=$customer['telefono']?></td>
                                    <td><?=$customer['email']?></td>
                                </tr>
                                <?php endwhile; ?>
                            <?php endif;?>
                    </tbody>
                </table>
                <div class="buttons button-see">
                    <ul class="buttons-container see">
                        <li class="btn">
                            <a class="add" href="all-customers.php">
                                <p>See More</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once('includes/footer-admin.php') ?>