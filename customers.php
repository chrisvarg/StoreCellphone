<?php require_once('includes/headerPanel.php')?>
<?php require_once('includes/sidebarPanel.php')?>

<div class="session-container">
            <div class="session-text">
                <?php if(isset($_SESSION['user'])):  ?>
                    <h2>Customers</h2>
                    
                <?php else: ?>
                    <?php echo "<p>Error Login</p>"; ?>
                <?php endif; ?>
            </div>
            <div class="session-text message">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos corrupti rem impedit voluptas commodi!
                In expedita repellendus odio iure impedit esse officia nostrum reprehenderit laborum ipsam aperiam minus recusandae, inventore ex quidem ab! placeat.</p>    
            </div>
            
            <div class="prices">
                <div class="prices-container">
                    <div class="prices-tittle">
                        <h2>sold products</h2>    
                    </div>
                    <div class="session-text price-text">
                        <?php $product = lastProduct($db);?>
                        <h4><?=$product['nombre']?></h4>
                    </div>
                </div>
                <div class="prices-container">
                    <div class="prices-tittle">
                        <h2>Total Sale</h2>    
                    </div>
                    <div class="session-text price-text">
                        <?php $users = numberUsers($db);?>
                        <h4>$ <?=number_format($product['precio'], 0, ',', '.')?></h4>
                    </div>
                </div>
                <div class="prices-container">
                    <div class="prices-tittle">
                        <h2>Users</h2>    
                    </div>
                    <div class="session-text price-text">
                        <h3><?=$users['total']?></h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>