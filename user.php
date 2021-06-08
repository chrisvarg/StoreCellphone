<?php require_once('includes/headerPanel.php'); ?>

<?php 
    $user = $_SESSION['user']; // comprueba el usuario
    userRestrictions($user['position']); // restringe al usuario segun su position
    
    // consulta el usuario que llega por get
    $userCurrent = user($db, $_GET['id']);
    // demuestra si el usuario existe 
    $existe = userExist($db, $_GET['id']);
    
?>

<?php require_once('includes/sidebarPanel.php'); ?>


<div class="session-container">
            <div class="session-text">
                <?php 
                    if(isset($_SESSION['user'])):?>
                        <h2><?=$userCurrent['nombre']?></h2>
                    <?php endif; ?>
            </div>
            
            <div class="alert alert-update">
                <?php if(isset($_SESSION['complete'])) :
                    echo "<div class='alert alert-complete alert-udpdate'>{$_SESSION['complete']}</div>"; ?>
                    <?php //header("Refresh: 5; URL=element.php?id={$userCurrent['id']}")?>
                <?php endif; ?>        
            </div>
            <div class="element-container">
                
                <div class="element-image">
                    <figure >
                        <img class="element-profile" src="./users/<?=$userCurrent['imagen']?>" alt="">
                    </figure>
                    <pre>
                    <?php 
                        // var_dump()
                    ?>
                    </pre>
                    
                </div>
                <div class="session-text message element-text">
                    <div class="information dates element-text__date">
                        <h4>Id: <span><?=$userCurrent['id']?></span></h4>
                        <h4>Name: <span><?=$userCurrent['nombre']?></span></h4>
                        <h4>Last Name: <span><?=$userCurrent['apellidos']?></span></h4>
                        <h4>Position: <span><?=$userCurrent['position']?></span></h4>
                        <h4>E-mail: <span><?=$userCurrent['email']?></span></h4>
                        <h4>fecha: <span><?=$userCurrent['fecha']?></span></h4>
                    </div>    
                </div>
            </div>
            <div class="buttons buttons-elements">
                <ul class="buttons-container ">
                    <li class="btn">
                        <a class="remove" href="remove-user.php?id=<?=$userCurrent['id']?>">
                            <span class="material-icons-round">add_circle</span>
                            <p>Remove</p>
                        </a>
                    </li>

                    <li class="btn">
                        <a class="update" href="update-user.php?id=<?=$userCurrent['id']?>">
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

<pre>
    <?php //$elements = listelements($db); ?>
    <?php //var_dump($elements); ?>
    
</pre>