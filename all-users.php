<?php require_once('includes/headerPanel.php')?>
<?php require_once('includes/sidebarPanel.php')?>

<div class="session-container">
            <div class="session-text">
                    <h2>Users</h2>                    
            </div>
            
            <div class="buttons">
                <ul class="buttons-container btn-add">
                    <li class="btn">
                        <a class="add" href="add-user.php">
                            <span class="material-icons-round">add_circle</span>
                            <p>Add</p>
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
                            <th>Last Names</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $users = listElements($db, 'usuarios');
                            if (!empty($users)):
                                while($user = mysqli_fetch_assoc($users)):
                        ?>
                                    <tr>
                                        <td>
                                            <a href="user.php?id=<?=$user['id'];?>">Details</a>
                                        </td>
                                        <td><?=$user['id'];?></td>
                                        <td><?=$user['nombre'];?></td>
                                        <td><?=$user['apellidos'];?></td>
                                        <td><?=$user['position'];?></td>
                                        <td><?=$user['email'];?></td>
                                        <td><?=$user['fecha'];?></td>
                                    </tr>
                                <?php endwhile;?>
                            <?php endif; ?>
                    </tbody>
                </table>

                <div class="buttons button-see">
                    <ul class="buttons-container see">
                        <li class="btn">
                            <a class="add" href="all-users.php">
                                <p>See More</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>