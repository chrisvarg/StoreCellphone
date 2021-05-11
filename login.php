<?php

include_once('includes/conexion.php');

if(isset($_POST)){
    
    // RECOGER DATOS FORMULARIO
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    /**
     * Comprobar si los datos estan en la base de datos 
     * por medio del email
    */
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);
    
    if ($login && mysqli_num_rows($login)){

        // Pasar los datos del usuario a un array asociativo
        $user = mysqli_fetch_assoc($login);    
        
        // Comprobar si la contraseña es la correcta
        $verifyPassword = password_verify($password, $user['password']);

        if($verifyPassword){
            // Usar los datos del user como una variable de session
            $_SESSION['user'] = $user;
        }else {
            // Si no existe datos de session crear una variable de error
            $_SESSION['error-login'] = 'Error al iniciar sessión';

            // borrar error de login si inicia sesion
            if($_SESSION['error-login']){
                unset($_SESSION['error-login']);
            }
        }

    }else {
        // Si no existe datos de session crear una variable de error
        $_SESSION['error-login'] = 'Error al iniciar sessión';
    }
}


header('Location: singIn.php');
