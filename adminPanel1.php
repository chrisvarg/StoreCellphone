<?php //require_once('includes/headerSign.php'); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>adsad
asdasd
        
</body>
</html>

</h2>
INICIO SESSIÓN
<h2>

<strong>
Aqui voy a diseñar la interfaz de sessión Lempo xD

Algo sencillo sin complicaciones
</strong>

<?php if(isset($_SESSION['user'])):  ?>
<?php echo "<p>{$_SESSION['user']['nombre']} {$_SESSION['user']['apellidos']}</p>"; ?>
<?php echo "<pre>";
var_dump($_SESSION['user']) . '</pre>';?>
<?php else: ?>
        <?php echo "<p>{$_SESSION['error-login']}</p>"; ?>
<?php endif; ?>