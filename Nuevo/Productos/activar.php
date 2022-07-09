<?php
include("../../Model/conexion.php");
$con=conectar();

$Codigo=$_POST['Codigo'];

$sql="UPDATE `producto` SET Estatus=1 WHERE Codigo='$Codigo'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: productos.php");
    }
?>