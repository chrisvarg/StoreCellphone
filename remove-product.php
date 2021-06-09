<?php 
require_once('includes/helpers.php');
require_once('includes/conexion.php');

// comprueba si datos por get existen
$idProduct = $_GET['id'];

$remove = remove($db, $idProduct, 'id', 'productos');

if ($remove){
    header('Location: products.php');
}else {
    header('Location: product.php');

}
