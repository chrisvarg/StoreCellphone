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
    $eraser = false;
    /**
     * Borra los todas las sessiones de error y sus variables
     */
    if (isset($_SESSION['errors'])){
        $_SESSION['errors'] = null;
        $eraser = true;
    }
    
    if (isset($_SESSION['errorsProducts'])) {
        $_SESSION['errorsProducts'] = null;
        $eraser = true;
    }

    if (isset($_SESSION['complete'])) {
        $_SESSION['complete'] = null;
        $eraser = true;
    }

    if (isset($_SESSION['error-login'])){
        $_SESSION['error-login'] = null;
        $eraser = true;
    }
    
    return $eraser;
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
     * Consulta el ultimo producto comprado ingresado en la db
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
    $sql = "SELECT COUNT(id) AS total FROM usuarios;";
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
    if(isset($_SESSION['user'])) {
        header('Location: admin.php');
        exit();
    }
}

function redirect()
{
    /**
     * Si la sessión de usuario no existe redirecciona
     */
    if (! isset($_SESSION['user'])){
        header('Location: index.php'); 
    }
}

function listProducts($db, $limit = null)
{
    /**
     * Consulta la lista de los productos registrados
     * segundo parametro limita a 10, si es true
     */
    $sql = "SELECT * FROM productos ORDER BY id ";

    if($limit){
        $sql .= "DESC LIMIT 2";
    }

    $products = mysqli_query($db, $sql);
    
    $result = [];

    if( $products && mysqli_num_rows($products) >= 1){
        $result = $products;
    }
    return $result;
}

function product($db, $id)
{
    /**
     * Consulta la lista de los productos registrados
     * segundo parametro limita a 10, si es true
     *
     * 
    * Puede servir para mostrar en el index*/

    $sql = "SELECT * FROM productos WHERE id = '{$id}';";
    $products = mysqli_query($db, $sql);
    
    $result = [];
    if( $products && mysqli_num_rows($products) >= 1){
        $result = mysqli_fetch_assoc($products);

    }
    return $result;
}

function productExist($db, $id){
    $product = product($db, $id);
    if (! isset($product['id'])) {
        header('Location: products.php');
    }
}


function lockPosition()
{
    if ($_SESSION['user']['position'] == 'boss') {
        $select = '<select name="position">
                        <option value="boss">Boss</option>
                        <option value="employed">Employed</option>
                    </select>';

    } else {
        $select = '<select name="position" disabled>
                        <option value="employed">Employed</option>
                        <option value="boss">Boss</option>
                   </select>';
    }
    
    return $select;
    
}