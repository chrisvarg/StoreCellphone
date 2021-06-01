<?php require_once('includes/headerPanel.php')?>
<?php require_once('includes/sidebarPanel.php')?>

<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <h2>Users</h2>
                    
                <?php else: ?>
                    <?php echo "<p>Error Login</p>"; ?>
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
                            <th>Last Names</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Christian</td>
                            <td>Vargas</td>
                            <td>Boss</td>
                            <td>admin@admin.com</td>
                            <td>2021-05-27</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Christian</td>
                            <td>Vargas</td>
                            <td>Boss</td>
                            <td>admin@admin.com</td>
                            <td>2021-05-27</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Christian</td>
                            <td>Vargas</td>
                            <td>Boss</td>
                            <td>admin@admin.com</td>
                            <td>2021-05-27</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Christian</td>
                            <td>Vargas</td>
                            <td>Boss</td>
                            <td>admin@admin.com</td>
                            <td>2021-05-27</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Christian</td>
                            <td>Vargas</td>
                            <td>Boss</td>
                            <td>admin@admin.com</td>
                            <td>2021-05-27</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Christian</td>
                            <td>Vargas</td>
                            <td>Boss</td>
                            <td>admin@admin.com</td>
                            <td>2021-05-27</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>1</td>
                            <td>Christian</td>
                            <td>Vargas</td>
                            <td>Boss</td>
                            <td>admin@admin.com</td>
                            <td>2021-05-27</td>
                        </tr>
                       
                        
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>