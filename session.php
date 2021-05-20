<?php require_once('includes/headerSign.php'); ?>

INICIO SESSIÓN

Aqui voy a diseñar la interfaz de sessión Lempo xD

Algo sencillo sin complicaciones

<?php if(isset($_SESSION['user'])):  ?>
        <?php echo "<p>{$_SESSION['user']['nombre']} {$_SESSION['user']['apellidos']}</p>"; ?>
        <?php 
        echo "<pre>";
        var_dump($_SESSION['user']) . '</pre>';?>
<?php else: ?>
        <?php echo "<p>{$_SESSION['error-login']}</p>"; ?>
<?php endif; ?>