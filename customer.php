<?php require_once('includes/headerPanel.php'); ?>
<?php 
    $cliente = element($db, $_GET['id'], 'clientes');
    $existe = elementExist($db, $_GET['id'], 'clientes');
    $userCurrent = $_SESSION['user'];
?>
<?php require_once('includes/sidebarPanel.php'); ?>

<div class="session-container">
            <div class="session-text">
                <?php 
                    if(isset($_SESSION['user'])):?>
                        <h2><?=$cliente['nombre']?> <?=$cliente['apellidos']?></h2>
                    <?php endif; ?>
            </div>
            
            <div class="alert alert-update">
                <?php if(isset($_SESSION['complete'])) :
                    echo "<div class='alert alert-complete alert-udpdate'>{$_SESSION['complete']}</div>"; ?>
                    <?php //header("Refresh: 5; URL=product.php?id={$cliente['id']}")?>
                <?php endif; ?>        
            </div>

            <div class="element-container">
                <div class="element-image">
                    <figure>
                        <!-- <img class ="element-image" src="<span class="material-icons-round">supervised_user_circle</span>" alt=""> -->
                        <span class="material-icons-round image-customer">person</span>
                    </figure>
                </div>

                <div class="session-text message element-text">
                    <div class="information dates element-text__date">
                        <h4>Id: <span><?=$cliente['id']?></span></h4>
                        <h4>Full Name: <span><?=$cliente['nombre']?> <?=$cliente['apellidos']?></span></h4>
                        <h4>Product: <span><?=$cliente['producto']?></span></h4>
                        <h4>Document: <span><?=number_format($cliente['documento'], 0, ',', '.')?></span></h4>
                        <h4>Address: <span><?=$cliente['direccion']?></span></h4>
                        <h4>Contact: <span><?=$cliente['telefono']?></span></h4>
                        <h4>Seller: <span><?=$cliente['usuarioNombre']?> <?=$cliente['usuarioApellidos']?></span></h4>
                    </div>    
                </div>
            </div>

            <div class="buttons buttons-elements">
                <ul class="buttons-container ">
                    <?php if ($userCurrent['position'] == 'boss'): ?> 
                            <li class="btn">
                                <a class="remove" href="remove-product.php?id=<?=$product['id']?>">
                                    <span class="material-icons-round">add_circle</span>
                                    <p>Remove</p>
                                </a>
                            </li>
                    <?php endif; ?>
                    <li class="btn">
                        <a class="update" href="update-customer.php?id=<?=$cliente['id']?>">
                            <span class="material-icons-round">add_circle</span>
                            <p>Update</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php eraserErrors();?>
</main>