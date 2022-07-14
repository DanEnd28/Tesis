<?php
include("../../Model/conexion.php");
$con=conectar();

$Codigo=$_POST['Codigo'];
$Descripcion=$_POST['Descripcion'];
$Precio=$_POST['Precio'];

$sql="UPDATE producto SET Codigo='$Codigo',Descripcion'=$Descripcion',Precio='$Precio' WHERE CodigoM='$Codigo'";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: productos.php");
}else {
}
?>