<?php 

if (isset($_POST)){

    // CONEXIÓN A LA BASE DE DATOS
    require_once('includes/conexion.php');
    
    // INICIO DE SESSION 
    if (isset($_SESSION) == false) {
        session_start();
    }

    // VERIFCAR SI LOS DATOS ESTA LLEGANDO
    $name = $_POST['name'] ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $lastname = $_POST['lastname'] ? mysqli_real_escape_string($db, $_POST['lastname']) : false;
    $idProduct = $_POST['product'] ? (int) mysqli_real_escape_string($db, $_POST['product']) : false;
    $idUser = $_POST['user'] ? (int)(mysqli_real_escape_string($db, $_POST['user'])) : false;
    $document = $_POST['document'] ? (int) mysqli_real_escape_string($db, $_POST['document']) : false;
    $address = $_POST['address'] ? mysqli_real_escape_string($db, $_POST['address']) : false;
    $contact = $_POST['contact'] ? (int)(mysqli_real_escape_string($db, $_POST['contact'])) : false;
    $email = $_POST['email'] ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $idCurrent = $_GET['id'];

    // ARRAY DE ERRORES
    $errors = [];

    // VALIDAR LOS DATOS QUE LLEGAN
        // VALIDACIÓN NOMBRE
    if ((! empty($name)) && (! is_numeric($name))) {
        $validName = true;

    } else {
        $validName = false;
        $errors['name'] = 'Invalid Name';
    }

        // VALIDATION LASTNAME
    if ((! empty($lastname)) && (! is_numeric($lastname))) {
        $validLastname = true;

    } else {
        $validLastname = false;
        $errors['lastname'] = 'Invalid Last Name';
    }

        // VALIDACIÓN PRODUCTO
    if ((! empty($idProduct)) && (is_int($idProduct)) && filter_var($idProduct, FILTER_VALIDATE_INT)) {
        $validProduct = true;

    } else {
        $validProduct = false;
        $errors['product'] = 'Invalid Id Product';
    }
        // VALIDACIÓN USUARIO
    if ((! empty($idUser)) && (is_int($idUser)) && filter_var($idUser, FILTER_VALIDATE_INT)) {
        $validUser = true;

    } else {
        $validUser = false;
        $errors['idUser'] = 'Invalid Id User';
    }

        // VALIDATION DOCUMENTO
    if ((! empty($document)) && (is_int($document)) && filter_var($document, FILTER_VALIDATE_INT)) {
        $validDocument = true;

    } else {
        $validDocument = false;
        $errors['document'] = 'Invalid Document';
    }

        // VALIDATION DIRECCION
    if ((! empty($address)) && (! is_numeric($address))) {
        $validAddress = true;

    } else {
        $validAddress = false;
        $errors['address'] = 'Invalid Address';
    }

        // VALIDATION CONTACT
    if ((! empty($contact)) && (is_int($contact)) && filter_var($contact, FILTER_VALIDATE_INT)) {
        $validContact = true;

    } else {
        $validContact = false;
        $errors['contact'] = 'Invalid Contact';
    }

        // VALIDATION EMAIL
    if ((! empty($email)) && (filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $validEmail = true;

    } else {
        $validEmail = false;
        $errors['email'] = 'Invalid Email';
    }

        // VALIDAR CANTIDAD DE ERRORES
    $customersSave = false;
    if (count($errors) == 0) {
        $customersSave = true;
        
        // ACTUALIZAR LOS DATOS DEL USUARIO EN LA BASE DE DATOS
        $sql = "UPDATE clientes SET
                id_producto = '{$idProduct}',
                nombre = '{$name}',
                apellidos = '{$lastname}',
                documento = '{$document}',
                telefono = '{$contact}',
                email = '{$email}'
                WHERE id = '{$idCurrent}';";

        $update = mysqli_query($db, $sql);

        if ($update) {
            $_SESSION['complete'] = 'Registation completed';

        }elseif (! $update) {
            $_SESSION['errors']['general'] = 'Save Failed';
        }
        
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: update-customer.php?id={$idCurrent}");
        exit();
    }
}
header("Location: customer.php?id={$idCurrent}");