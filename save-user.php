<?php

if(isset($_POST)){
    
    // CONEXIÓN BASE DE DATOS   
    require_once('includes/conexion.php');
    
    // INICIO DE SECCIÓN
    if(isset($_SESSION) == false){
        session_start();
    }

    /**
     * VERIFICAR SI LOS DATOS DE SINGUP ESTAN LLEGANDO
     * 
     * Se usa los operadores ternarios del if, siendo mas compacto del if
     * siendo ({condición} ? {si se cumple} : {si no se cumple})
     * 
     * mysqli_escape_string, es una función de php para que
     * tome las variables de los datos como string en mysql
     */
    $name = isset($_POST['name']) ? mysqli_escape_string($db, $_POST['name']) : false;
    $lastname = isset($_POST['lastname']) ? mysqli_escape_string($db, $_POST['lastname']) : false;
    $position = isset($_POST['position']) ? mysqli_escape_string($db, $_POST['position']) : false;
    $email = isset($_POST['email']) ? mysqli_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_escape_string($db, $_POST['password']) : false;

 
    // ARRAY DE ERRORES
    $errors = [];

    // VERIFICAR LOS DATOS QUE LLEGAN

        // validación nombre
    if ((! empty($name)) && (! is_numeric($name)) && (! preg_match('/[0-9]/', $name))) {
        $validName = true;
    } else {
        $validName = false;
        $errors['name'] = "Invalid name";
    }

        // validación apellidos
    if ((! empty($lastname)) && (! is_numeric($lastname)) && (! preg_match('/[0-9]/', $lastname))) {
        $validLastname = true;
    } else {
        $validLastname = false;
        $errors['lastname'] = "Invalid lastname";
    }

        // validación position
    if ((! empty($position)) && (! is_numeric($position)) && (! preg_match('/[0-9]/', $position))) {
        $validPosition = true;
    } else {
        $validPosition = false;
        $errors['position'] = "Invalid position";
    }

        // validación email
    if ((! empty($email)) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validEmail = true;
    } else {
        $validEmail = false;
        $errors['email'] = "Invalid email";
    }

        // validación password
    if (! empty($password)) {
        $validPassword = true;
    } else {
        $validPassword = false;
        $errors['password'] = "Empty password";
    }

        // VALIDAR CUANTOS ERRORES SE PRESENTARON SINO SUBIR DB
    $userSave = false;
    if (count($errors) == 0 ) {
        
        
        $userSave = true;

        
        // CIFRAR LA CONTRASEÑA
            /**
             * Las contraseñas se deben cifrar ya que se guardarian
             * en limpio, y eso es ilegal para evitarlo se debe
             * cifrar o encriptar
            */
        $securepassword = password_hash($password,PASSWORD_BCRYPT, ['cost=>4 ']);

        // INSERTAR EL USUARIO A LA BASE DE DATOS
        // consulta para subir los datos
        $sql = "INSERT INTO usuarios 
                VALUES(null, '{$name}', '{$lastname}', '{$position}', '{$email}', '{$securepassword}', NULL, CURDATE())";
            
            // Subir los datos a la tabla usuarios db
        $insert = mysqli_query($db, $sql);
        

        if ($insert) {
            $_SESSION['complete'] = "Registration Completed";
        } else {
            $_SESSION['errors']['general'] = "Save Failed";
        }
    }else {
        $_SESSION['errors'] = $errors;
    }
    
}
header('Location: add-user.php');