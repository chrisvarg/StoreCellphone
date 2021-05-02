<?php

if(isset($_GET)){
    
    // RECOGER DATOS FORMULARIO
    $email = $_GET['email'];
    $password = $_GET['password'];

}else {
    echo 'error';
}

header('Location: index.php');
