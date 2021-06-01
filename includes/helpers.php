<?php

function showErrors($errors, $date)
{   
    /**
     * Muestra los errores que se presentan al ingresar los datos
     */
    $alert = '';
    if(isset($errors[$date]) && (!empty($date))) {

        $alert = "<div class='alert alert-error'>{$errors[$date]}</div>";
    }
    return $alert;
}

function eraserErrors()
{   
    /**
     * Borra los todas las sessiones de error y sus variables
     */
    if (isset($_SESSION['errors'])){
        $_SESSION['errors'] = null;
        unset($_SESSION['errors']);
    }
    
    if (isset($_SESSION['complete'])) {
        $_SESSION['complete'] == null;
        unset($_SESSION['complete']);
    }

    if (isset($_SESSION['error-login'])){
        $_SESSION['error-login'] = null;
        unset($_SESSION['error-login']);
    }
}

function menuAdmin($userType) {
    
    /**
     * Selecciona el menu según el tipo de usuario que ingresa
     */
    $sidebarAdmin = [
        'Dashboard' => '<span class="material-icons-round">space_dashboard</span>', 
        'Products'  => '<span class="material-icons-round">inventory_2</span>',
        'Customers' => '<span class="material-icons-round">people</span>',
        'Users'     => '<span class="material-icons-round">manage_accounts</span>',
        'My Data'   => '<span class="material-icons-round">person</span>'
    ];
    $sidebarUser = [
        'Dashboard' => '<span class="material-icons-round">space_dashboard</span>', 
        'Products'  => '<span class="material-icons-round">inventory_2</span>',
        'Customers' => '<span class="material-icons-round">people</span>',
        'My Data'   => '<span class="material-icons-round">person</span>'
    ];

    if ($userType == 'boss'){
        $result = $sidebarAdmin;
    }else {
        $result = $sidebarUser;
    }

    return $result;
}

function lastProduct($db) 
{
    /**
     * Consulta el ultimo producto ingresado en la db
     */
    $sql = "SELECT c.id, c.id_producto, p.nombre, p.precio, c.fecha
            FROM clientes c
            INNER JOIN productos p ON c.id_producto = p.id
            ORDER BY c.fecha DESC LIMIT 1;";

    $productSold = mysqli_query($db, $sql);
    $productSold = mysqli_fetch_assoc($productSold);

    return $productSold;
}

function numberUsers($db)
{
    /**
     * Consulta cuantos usuarios se encuentran en la db
     */
    $sql = 'SELECT COUNT(id) AS total FROM usuarios;';
    $numerUsers = mysqli_query($db, $sql);
    $numerUsers = mysqli_fetch_assoc($numerUsers);

    return $numerUsers;
}

function keepSession()
{
    /**
     * Redirecciona al admin.php si existe los datos del usuario
     * sino de dirige al index
     */
    // if(isset($_SESSION['user'])) {
    //     header('Location: admin.php');
    //     exit();
    // }
}