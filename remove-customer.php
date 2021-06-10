<?php 
require_once('includes/helpers.php');
require_once('includes/conexion.php');

// comprueba si datos por get existen
$idcustomer = $_GET['id'];

$remove = remove($db, $idcustomer, 'id', 'clientes');

if ($remove){
    header('Location: customers.php');
}else {
    header('Location: customer.php');

}
