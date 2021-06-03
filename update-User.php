<?php



if(isset($_POST)){
    
    // CONEXIÓN BASE DE DATOS   
    require_once('includes/conexion.php');
    
    /**
     * VERIFICAR SI LOS DATOS DE MY DATA ESTAN LLEGANDO
     */
    $name = isset($_POST['name']) ? mysqli_escape_string($db, $_POST['name']) : false;
    $lastname = isset($_POST['lastname']) ? mysqli_escape_string($db, $_POST['lastname']) : false;
    $position = isset($_POST['position']) ? mysqli_escape_string($db, $_POST['position']) : false;
    $email = isset($_POST['email']) ? mysqli_escape_string($db, trim($_POST['email'])) : false;

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

    // VALIDAR CUANTOS ERRORES SE PRESENTARON SINO SUBIR DB
    $userSave = false;
    if (count($errors) == 0 ) {
        
        $user = $_SESSION['user'];
        $userSave = true;

        
        // COMPROBAR SI EL EMAIL YA EXISTE EN LA BASE DE DATOS
        $sql = "SELECT id, email FROM usuarios
                WHERE email = '{$email}';";

        $issetEmail = mysqli_query($db, $sql);
        $issetUser = mysqli_fetch_assoc($issetEmail);

        
        if($issetUser['id'] == $user['id'] || empty($issetUser)) {
            // ACTUALIZAR EL USUARIO A LA BASE DE DATOS
                // consulta para subir los datos
            $sql = "UPDATE usuarios SET
                    nombre = '{$name}',
                    apellidos = '{$lastname}',
                    position = '{$position}',
                    email = '{$email}'
                    WHERE id = '{$user['id']}'";
    
                // Subir los datos a la tabla usuarios db
            $insert = mysqli_query($db, $sql);
            
            if ($insert) {
                $_SESSION['user']['nombre'] = $name;
                $_SESSION['user']['apellidos'] = $lastname;
                $_SESSION['user']['position'] = $position;
                $_SESSION['user']['email'] = $email;
    
                $_SESSION['complete'] = "Successful upgrade";
            } else {
                $_SESSION['errors']['general'] = "Update failed";
            }
        } else {
            $_SESSION['errors']['general'] = "User exists";
        }

    } else {
        $_SESSION['errors'] = $errors;
    }
    
}
header('Location: mydata.php');
