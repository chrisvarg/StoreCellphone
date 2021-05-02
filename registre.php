<?php

if(isset($_GET)){

    $name = $_GET['name'] . '<br>';
    $lastname = $_GET['lastname'] . '<br>';
    $position = $_GET['position'] . '<br>';
    $email = $_GET['email'];
    $password = $_GET['password']. '<br>';

}else {
    echo 'no llega';
}

header('Location: index.php');