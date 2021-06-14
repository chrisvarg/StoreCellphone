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


function elementExist($db, $id, $table){
    
    $element = element($db, $id, $table);
    if (! isset($element['id'])) {
        switch (! isset($element['id'])) {
            case $table == 'clientes':
                return header('Location: customers.php');
                break;
            case $table == 'usuarios':
                return header('Location: users.php');
                break;
            case $table == 'productos':
                return  header('Location: products.php');
                break;
        }
    }
}

function existeProduct($db, $id, $table){
    
    $element = element($db, $id, $table);
    if (! isset($element['id'])) {
        return  header('Location: store.php');
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

function remove($db, $idGet, $valor, $tabla)
{   
    $result = false;
    if (empty($idGet)) {
        $result = false;
        
    }else {
    
        // id del producto a remover
        $sql = "DELETE from $tabla WHERE $valor = '{$idGet}';";
        // echo $sql;
        // die();
        $remove = mysqli_query($db, $sql);
        $result = true;
    }

    return $result;
}

function userRestrictions($position) {
    if ($position == 'employed') {
        return header('Location: admin.php');
        // exit();
    }
}

function listElements($db, $table, $limit = null)
{
    /**
     * Consulta la lista de los productos registrados
     * segundo parametro limita a 10, si es true
     */

    if($table == 'clientes') {
        $sql = "SELECT c.*, u.nombre AS 'usuarioNombre', u.apellidos AS 'usuarioApellidos', p.nombre AS 'producto'
        FROM $table c
        INNER JOIN productos p ON c.id_producto = p.id
        INNER JOIN usuarios u ON c.id_usuario = u.id 
        ORDER BY id ";
    }else {
        $sql = "SELECT * FROM $table ORDER BY id ";
    }

    if($limit){
        $sql .= "DESC LIMIT 2";
    }

    $element = mysqli_query($db, $sql);
    $result = [];

    if( $element && mysqli_num_rows($element) >= 1){
        $result = $element;
    }
    return $result;
}

function element($db, $id, $table)
{
    /**
     * Consulta la lista de los productos registrados
     * segundo parametro limita a 10, si es true
     *
     * 
    * Puede servir para mostrar en el index*/
    if($table == 'clientes'){
        $sql = "SELECT c.*, u.nombre AS 'usuarioNombre', u.apellidos AS 'usuarioApellidos', p.nombre AS 'producto'
            FROM clientes c
            INNER JOIN productos p ON c.id_producto = p.id
            INNER JOIN usuarios u ON c.id_usuario = u.id 
            WHERE c.id = '{$id}';";
    } else {
        $sql = "SELECT * FROM $table WHERE id = '{$id}';";
    }
    $element = mysqli_query($db, $sql);
    
    $result = [];
    if( $element && mysqli_num_rows($element) >= 1){
        $result = mysqli_fetch_assoc($element);
    }
    return $result;
}

function customers($db, $limit = null)
{
    $sql = "SELECT c.*, u.nombre AS 'usuario', p.nombre AS 'producto'
            FROM clientes c
            INNER JOIN productos p ON c.id_producto = p.id
            INNER JOIN usuarios u ON c.id_usuario = u.id 
            ORDER BY id ";
    
    if($limit){
        $sql .= "DESC LIMIT 10;";
    }
    $element = mysqli_query($db, $sql);

    $result = [];
    if( $element && mysqli_num_rows($element) >= 1){
        $result = $element;
        return $result;
    }
}
// $clientes = clientes($db);
