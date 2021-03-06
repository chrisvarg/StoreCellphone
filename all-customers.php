<?php require_once('includes/headerPanel.php')?>
<?php require_once('includes/sidebarPanel.php')?>

<div class="session-container">
            <div class="session-text">
                    <h2>Customers</h2>
            </div>

            <div class="buttons">
                <ul class="buttons-container btn-add">
                    <li class="btn">
                        <a class="add" href="add-customer.php">
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
                            <th>User</th>
                            <th>Product</th>
                            <th>Full Name</th>
                            <th>Document</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $customers = customers($db); 
                            if(! empty($customers)):
                                while($customer = mysqli_fetch_assoc($customers)):
                        ?>
                                <tr>
                                    <td>
                                        <a href="customer.php?id=<?=$customer['id'];?>">Details</a></td>
                                    </td>
                                    <td><?=$customer['id']?></td>
                                    <td><?=$customer['usuario']?></td>
                                    <td><?=$customer['producto']?></td>
                                    <td><?=$customer['nombre']?> <?=$customer['apellidos']?></td>
                                    <td><?=$customer['documento']?></td>
                                    <td><?=$customer['direccion']?></td>
                                    <td><?=$customer['telefono']?></td>
                                    <td><?=$customer['email']?></td>
                                </tr>
                                <?php endwhile; ?>
                            <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once('includes/footer.php') ?>