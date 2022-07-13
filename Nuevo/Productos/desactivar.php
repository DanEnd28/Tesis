<?php
include("../../Model/conexion.php");
$con=conectar();

$Codigo=$_GET['id'];

$sql="UPDATE `producto` SET Estatus=0 WHERE Codigo='$Codigo'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: productos.php");
        
    }
?>
<script>
    alert("Regisatro Grabado con Exito");+
    history.back();
</script>