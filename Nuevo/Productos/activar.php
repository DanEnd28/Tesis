<?php
include("../../Config/config.php");
include("../../Model/conexion.php");
$con=conectar();

$Codigo= openssl_decrypt($_GET['id'],AES,KEY);

$sql="UPDATE `producto` SET Estatus=1 WHERE Codigo='$Codigo'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: productos.php");
    }
?>