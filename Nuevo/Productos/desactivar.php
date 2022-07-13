<?php
include("../../Config/config.php");
include("../../Model/conexion.php");
$con=conectar();

$Codigo= openssl_decrypt($_GET['id'],AES,KEY) ;

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