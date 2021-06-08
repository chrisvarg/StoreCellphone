<?php 

require_once('includes/helpers.php');
require_once('includes/conexion.php');

// comprueba si datos por get existen
$idUser = $_GET['id'];

$remove = remove($db, $idUser, 'id', 'usuarios');

if ($remove){
    header('Location: users.php');
}else {
    header('Location: user.php');

}