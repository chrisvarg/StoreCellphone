<?php

function showErrors($errors, $date)
{   
    $alert = '';
    if(isset($errors[$date]) && (!empty($date))) {

        $alert = "<div class='alert alert-error'>{$errors[$date]}</div>";
    }
    return $alert;
}

function eraserErrors()
{   
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