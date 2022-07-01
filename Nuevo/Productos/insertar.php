<?php
include("../Model/conexion.php");
$con=conectar();

$Codigo=$_POST['Codigo'];
$Descripcion=$_POST['Descripcion'];
$Precio=$_POST['Precio'];
$Estatus=$_POST['Estatus'];


$sql="INSERT INTO producto VALUES('$Codigo','$Descripcion','$Precio','$Estatus')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: productos.php");
    
}else {
}
?>