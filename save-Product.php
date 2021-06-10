<?php

if(isset($_POST)) {
    require_once('includes/conexion.php');

    if (isset($_SESSION) == false) {
        session_start();
    }

    // VERIFCAR SI LOS DATOS ESTA LLEGANDO
    $name = $_POST['name'] ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $brand = $_POST['brand'] ? mysqli_real_escape_string($db, $_POST['brand']) : false;
    $price = $_POST['price'] ? (int) mysqli_real_escape_string($db, $_POST['price']) : false;
    $stock = $_POST['stock'] ? intval(mysqli_real_escape_string($db, $_POST['stock'])) : false;
    $description = $_POST['description'] ? mysqli_real_escape_string($db, $_POST['description']) : false;
    $image = $_FILES['image'];

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
        $validBrand = true;

    } else {
        $validBrand = false;
        $errors['brand'] = 'Invalid Brand';
    }

        // VALIDACIÓN PRECIO
    if ((! empty($price)) && (is_int($price)) && filter_var($price, FILTER_VALIDATE_INT)) {
        $validPrice = true;

    } else {
        $validPrice = false;
        $errors['price'] = 'Invalid Price';
    }

        // VALIDACIÓN IMAGEN
    if (! empty($image) && ($image['type'] == 'image/jpeg' || $image['type'] == 'image/png' || $image['type'] == 'image/gif' || $image['type'] == 'image/webp')) {
        $validImage = true;
    }else {
        $image = '';
        $validImage = false;
    }

        // VALIDACION STOCK
    if ((! empty($stock)) && (is_int($stock))) {
        $validStock = true;

    } else {
        $validAStock = false;
        $errors['stock'] = 'Invalid Stock ';
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
        
        // COMPROBAR SI EL NOMBRE YA EXISTE EN LA DB
        $sql = "SELECT id, nombre FROM productos
                WHERE nombre = '{$name}';";
        
        $issetname = mysqli_query($db, $sql);
        $issetProduct = mysqli_fetch_assoc($issetname) ;

        // Validar si existe ya un producto exxistente
        if(empty($issetProduct)) {
            if ($validImage) {
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
                        VALUES (null, '{$name}', '{$brand}', '{$price}', '{$description}',
                        '{$nameImagesProducts}', '{$stock}');";
            }
            
            $insert = mysqli_query($db, $sql);
            if ($insert) {
                $_SESSION['complete'] = 'Registration completed';
                echo "bien";
    
            } else {
                $_SESSION['errors']['general'] = 'Save failed';
            }

        }else {
            $_SESSION['errors']['general'] = 'Product exist';
        }

        // ERRORES O COMPLETE
    } else {
        $_SESSION['errors'] = $errors;        
    }
}
header('Location: add-product.php');
