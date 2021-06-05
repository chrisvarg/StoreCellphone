<?php

if(isset($_POST)) {
    require_once('includes/conexion.php');

    // VERIFCAR SI LOS DATOS ESTA LLEGANDO
    $name = $_POST['nombre'] ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $brand = $_POST['marca'] ? mysqli_real_escape_string($db, $_POST['marca']) : false;
    $price = $_POST['precio'] ? (int) mysqli_real_escape_string($db, $_POST['precio']) : false;
    $stock = $_POST['stock'] ? intval(mysqli_real_escape_string($db, $_POST['stock'])) : false;
    $description = $_POST['description'] ? mysqli_real_escape_string($db, $_POST['description']) : false;
    $image = $_FILES['imagen'];
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
        
        if ($image['name']) {
            // eliminamos la imagen anterior
            unlink($imagesProducts . $oldProduct['imagen']);

            /** 
             * Crea una nombres aleatorios para las imagenes a subir
             * md5 encripta y da el nombre uniqid genera un id unico
             * rand genera un numero aleatorio
            */
            $nameImagesProducts = md5(uniqid(rand(), true)) . '.jpg';
            move_uploaded_file($image['tmp_name'], $imagesProducts . $nameImagesProducts);

        } else {
            $nameImagesProducts = $nameImageCurrent;
        }

        /**
         * Comprobar si los datos que vamos a cambiar son los mismos
         * son los mis que entran por GET
         */
        $sql = "SELECT * FROM productos
                WHERE id = '{$idcurrent}';";
        $oldProduct = mysqli_query($db, $sql);
        $oldProduct = mysqli_fetch_assoc($oldProduct);
    
        // COMPROBAR SI NOMBRE NO SE REPITE DOS VECES EN BASE DE DATOS
        $sql = "SELECT id, nombre FROM productos
                WHERE nombre = '{$name}';";
        
        $verifyName = mysqli_query($db, $sql);
        $verifyNameProduct = mysqli_fetch_assoc($verifyName);
        
        // si repite el nombre se verifica cuantas veces
        $issetname = mysqli_query($db, $sql);
        $issetProduct = mysqli_fetch_all($issetname);
        

        if ((empty($verifyNameProduct))){
            /**
             * si el nombre no se ha usado antes
             */
            $sql = "UPDATE productos SET
                    nombre = '{$name}',
                    marca = '{$brand}',
                    precio = '{$price}',
                    description = '{$description}',
                    imagen = '{$nameImagesProducts}',
                    stock = '{$stock}'
                    WHERE id = '{$idcurrent}';";

            $update = mysqli_query($db, $sql);

        }elseif((count($issetProduct) == 1) && $oldProduct['nombre'] == $name) {
            /**
             * Condiciona sino existe el producto ó si existe
             * pero su id es igual al del metodos GET
             */
            $sql = "UPDATE productos SET
            nombre = '{$name}',
            marca = '{$brand}',
            precio = '{$price}',
            description = '{$description}',
            imagen = '{$nameImagesProducts}',
            stock = '{$stock}'
            WHERE id = '{$idcurrent}';";

            $update = mysqli_query($db, $sql);
            
        }else {
            $_SESSION['errorsProducts']['save'] = 'Product exist';
            header("Location: update-product.php?id={$idcurrent}");
            exit();
        }

        if ($update) {
            $_SESSION['complete'] = 'Update completed';
        } 

        if (! $update) {
            $_SESSION['errorsProducts']['save'] = 'Save failed';
        } 
        
        // ERRORES O COMPLETE
    } else {
        $_SESSION['errorsProducts'] = $errors;
        header("Location: update-product.php?id={$idcurrent}");
        exit();
    }
}
// echo 'Salio';
// exit();
header("Location: product.php?id={$idcurrent}");
