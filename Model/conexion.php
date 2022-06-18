<?php
$servername = "localhost";
$username = "root";
$password = "";
$basedatos = "Luncheria";
$conn = new mysqli ($servername,$username,$password,$basedatos);

//Validando

if($conn -> connect_error)
{
    die("Conexion Fallida").$conn -> connect_error;
}else{
   //echo('Conectado');
}