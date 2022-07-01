<?php
function conectar()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $basedatos = "Luncheria";
    
    $conn = new mysqli($servername, $username, $password, $basedatos);
    $con= mysqli_connect($servername, $username, $password);
    mysqli_select_db($con, $basedatos);
    return $con;
    //Validando

    if ($conn->connect_error) {
        die("Conexion Fallida") . $conn->connect_error;
    } else {
        //echo('Conectado');
    }
}
