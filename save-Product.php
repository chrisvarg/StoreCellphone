<?php

if(isset($_POST)) {
    require_once('includes/conexion.php');

    if (isset($_SESSION) == false) {
        session_start();
    }

    // VERIFCAR SI LOS DATOS ESTA LLEGANDO
    $name = $_POST['nombre'] ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $brand = $_POST['marca'] ? mysqli_real_escape_string($db, $_POST['marca']) : false;
    $price = $_POST['precio'] ? (int) mysqli_real_escape_string($db, $_POST['precio']) : false;
    $stock = $_POST['stock'] ? intval(mysqli_real_escape_string($db, $_POST['stock'])) : false;
    $description = $_POST['description'] ? mysqli_real_escape_string($db, $_POST['description']) : false;
    $image = $_FILES['imagen'];

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

    // VALIDATION MARCA
    if ((! empty($brand)) && (! is_numeric($brand))) {
        $validMarca = true;

    } else {
        $validMarca = false;
        $errors['marca'] = 'Invalid Brand';
    }

    // VALIDACIÓN PRECIO
    if ((! empty($price)) && (is_int($price)) && filter_var($price, FILTER_VALIDATE_INT)) {
        $validPrecio = true;

    } else {
        $validPrecio = false;
        $errors['precio'] = 'Invalid Price';
    }

    // VALIDACIÓN IMAGEN
    if (! empty($image) && ($image['type'] == 'image/jpeg' || $image['type'] == 'image/png' || $image['type'] == 'image/gif' || $image['type'] == 'image/webp')) {
        $validImage = true;
    }else {
        $image = 'No image';
        $validImage = false;
    }

    // VALIDACION STOCK
    if ((! empty($stock)) && (is_int($stock))) {
        echo $validStock = true;

    } else {
        $validAStock = false;
        echo $errors['stock'] = 'Invalid Stock ';
    }

    // VALIDACION DESCRIPTION
    if ((! empty($description)) && (! is_numeric($description))) {
        $valiDescription = true;

    } else {
        $validDescription = false;
        $errors['description'] = 'Empty Description';
    }

    // VALIDAR CANTIDAD DE ERRORES
    $productSave = false;
    if (count($errors) == 0) {

        $productSave = true;

        // validación de la carpeta de las images
        $imagesProducts = './products/';
        if (!is_dir($imagesProducts)) {
            mkdir($imagesProducts, 07777);
        }

        if($validImage) {

            /** Existe imagen
             * Crea una nombres aleatorios para las imagenes a subir
             * md5 encripta y da el nombre uniqid genera un id unico
             * rand genera un numero aleatorio
            */
            $nameImagesProducts = md5(uniqid(rand(), true)) . '.jpg';
            move_uploaded_file($image['tmp_name'], $imagesProducts.$nameImagesProducts);

             // INSERTAR EL PRODUCTO A LA BASE DE DATOS
            // Consulta para subir los datos
            $sql = "INSERT INTO productos
                    VALUES (null, '{$name}', '{$brand}', '{$price}', '{$description}', '{$nameImagesProducts}', '$stock');";
        }elseif ($image == 'No image') {

            // Si no existe la imagen
            $sql = "INSERT INTO productos
                VALUES (null, '{$name}', '{$brand}', '{$price}', '{$description}', '{$image}', '$stock');";
        }

        $insert = mysqli_query($db, $sql);
        if ($insert) {
            $_SESSION['complete'] = 'Registration completed';
            echo "bien";

        } else {
            $_SESSION['errorsProducts']['save'] = 'Save failed';
            echo 'mal';
        }

        // ERRORES O COMPEETE
    } else {
        $_SESSION['errorsProducts'] = $errors;        
    }
}

header('Location: add-product.php');
