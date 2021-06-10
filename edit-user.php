<?php
if(isset($_POST)) {
    require_once('includes/conexion.php');
    
    /**
     * VERIFICAR SI LOS DATOS DE MY DATA ESTAN LLEGANDO
     */
    $name = $_POST['name'] ? mysqli_escape_string($db, $_POST['name']) : false;
    $lastname = $_POST['lastname'] ? mysqli_escape_string($db, $_POST['lastname']) : false;
    $position = $_POST['position'] ? mysqli_escape_string($db, $_POST['position']) : false;
    $email = $_POST['email'] ? mysqli_escape_string($db, trim($_POST['email'])) : false;
    $image = $_FILES['image'];
    $nameImageCurrent = $_POST['nameImage'];
    $idcurrent =  $_GET['id'];
    
    // ERRORES
    $errors = [];

    // VALIDAR LOS DATOS QUE LLEGAN
        // VALIDACIÓN NOMBRE
    if ((! empty($name)) && (! is_numeric($name))) {
        $validName = true;

    } else {
        $validName = false;
        $errors['name'] = 'Invalid Name';
    }

        // VALIDATION APELLIDOS
    if ((! empty($lastname)) && (! is_numeric($lastname))) {
        $validLastname = true;

    } else {
        $validLastname = false;
        $errors['lastname'] = 'Invalid Lastname';
    }

        // VALIDACIÓN POSITION
    if ((! empty($position)) && (! is_numeric($position))) {
        $validPosition = true;

    } else {
        $validPrecio = false;
        $errors['position'] = 'Invalid Position';
    }

        // VALIDACION EMAIL
    if ((! empty($email)) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validEmail = true;

    } else {
        $validEmail = false;
        $errors['stock'] = 'Invalid Email ';
    }

        // VALIDACIÓN IMAGEN
    if (! empty($image) && ($image['type'] == 'image/jpeg' || $image['type'] == 'image/png' || $image['type'] == 'image/gif' || $image['type'] == 'image/webp')) {
        $validImage = true;
    }else {
        $validImage = false;
    }
    
        // VALIDAR CANTIDAD DE ERRORES
    $userSave = false;
    if (count($errors) == 0) {
        
        $userSave = true;
        
        // validación de la carpeta de las images
        $imagesUser = './users/';
        if (!is_dir($imagesUser)) {
            mkdir($imagesUser, 07777);
        }
        
        /**
         * Comprobar si los datos que vamos a cambiar son los mismos
         * son los mis que entran por GET
         */
        $sql = "SELECT * FROM usuarios
                WHERE id = '{$idcurrent}';";
        $oldUser = mysqli_query($db, $sql);
        $oldUser = mysqli_fetch_assoc($oldUser);

        // COMPROBAR SI NOMBRE NO SE REPITE DOS VECES EN BASE DE DATOS
        $sql = "SELECT id, nombre FROM usuarios
                WHERE nombre = '{$name}';";
        $verifyName = mysqli_query($db, $sql);
        $verifyNameUser = mysqli_fetch_assoc($verifyName);
        
        // si repite el nombre se verifica cuantas veces
        $issetname = mysqli_query($db, $sql);
        $issetUser = mysqli_fetch_all($issetname);
        
        if ($image['name']) {
            // eliminamos la imagen anterior
            unlink($imagesUser . $oldUser['imagen']);

            /** 
             * Crea una nombres aleatorios para las imagenes a subir
             * md5 encripta y da el nombre uniqid genera un id unico
             * rand genera un numero aleatorio
            */
            $nameImagesUser = md5(uniqid(rand(), true)) . '.jpg';
            move_uploaded_file($image['tmp_name'], $imagesUser . $nameImagesUser);

        } else {
            $nameImagesUser = $nameImageCurrent;
        }
        
        if ((empty($verifyNameUser))){
            /**
             * si el nombre no se ha usado antes
             */
            $sql = "UPDATE usuarios SET
                    nombre = '{$name}',
                    apellidos = '{$lastname}',
                    position = '{$position}',
                    email = '{$email}',
                    imagen = '{$nameImagesUser}'
                    WHERE id = '{$idcurrent}';";

            $update = mysqli_query($db, $sql);

        }elseif((count($issetUser) == 1) && $oldUser['email'] == $email) {
            /**
             * Condiciona si existe solo una vez el usuario ó si existe
             * pero su id es igual al del metodos GET
             */
            $sql = "UPDATE usuarios SET
            nombre = '{$name}',
            apellidos = '{$lastname}',
            position = '{$position}',
            email = '{$email}',
            imagen = '{$nameImagesUser}'
            WHERE id = '{$idcurrent}';";

            $update = mysqli_query($db, $sql);
            
        }else {
            $_SESSION['errors']['general'] = 'User Exist';
            header("Location: update-user.php?id={$idcurrent}");
            exit();
        }

        if ($update) {
            $_SESSION['complete'] = 'Update completed';
        } elseif (! $update) {
            $_SESSION['errors']['general'] = 'Save failed';
        } 
        
        // ERRORES O COMPLETE
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: update-user.php?id={$idcurrent}");
        exit();
    }
}
header("Location: user.php?id={$idcurrent}");
