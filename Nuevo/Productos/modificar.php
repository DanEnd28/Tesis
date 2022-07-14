<?php
include("../../Model/conexion.php");
$con=conectar();

$Codigo=$_POST['CodigoM'];
$Descripcion=$_POST['DescripcionM'];
$Precio=$_POST['PrecioM'];

$sql="UPDATE producto SET Codigo='$Codigo',Descripcion='$Descripcion',Precio='$Precio' WHERE Codigo='$Codigo'";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: productos.php");
}else {
}
?>