<?php

// CONEXIÓN BASE DE DATOS

function dbConexion()
{
    $hostname = 'localhost';
    $username = 'root';
    $password = ''; 
    $database = 'tienda';
    
    $db = mysqli_connect($hostname, $username, $password, $database);
    return $db;
}

$db = dbConexion();

mysqli_query($db, 'SET NAMES utf8');

session_start();