<?php

//Conexión base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$bd = 'blog';

$db = mysqli_connect($host, $user, $password, $bd);

mysqli_query($db, "SET NAMES 'utf8'");

//Iniciar sesión
if(!isset($_SESSION)){
    session_start();
}
