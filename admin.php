<?php require_once('includes/headerPanel.php');?>
<?php require_once('includes/sidebarPanel.php');?>

        <div class="session-container">
            <div class="session-text">
                <!-- MOSTRAR NOMBRE DEL USUARIO -->
                <?php if(isset($_SESSION['user'])):  ?>
                    <?php echo "<h2>Welcolme {$_SESSION['user']['nombre']} {$_SESSION['user']['apellidos']}</h2>"; ?>
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
                        <!-- PRECIO DEL ULTIMO PRODUCTO VENDIDO -->
                        <?php $product = lastProduct($db);?>

                        <h4><?=$product['nombre']?></h4>
                    </div>
                </div>
                <div class="prices-container">
                    <div class="prices-tittle">
                        <h2>Total Sale</h2>    
                    </div>
                    <div class="session-text price-text">
                        <!-- PRECIO TOTAL DEL ULTIMO CELULAR ADQUIRIDO -->
                        <h4>$ <?=number_format($product['precio'], 0, ',', '.')?></h4>
                    </div>
                </div>
                <div class="prices-container">
                    <div class="prices-tittle">
                        <h2>Users</h2>    
                    </div>
                    <div class="session-text price-text">
                        <!-- TOTAL DE USUARIOS REGISTRADOS -->
                        <?php 
                            $users = numberUsers($db);
                            if($users['total'] <= 1): ?>
                                <h3><?=$users['total']. ' User';?></h3>
                            <?php else: ?>
                            <h3><?=$users['total']. ' Users';?></h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<?php //require_once('includes/footer.php'); ?>

