<?php
session_start();

if(isset($_SESSION["nom_usu_ses"]))
{
    
    unset($_SESSION["nom_usu_ses"]);
    unset($_SESSION["tipo_usu_ses"]);
    unset($_SESSION["array_ingredientes"]);
}

session_destroy();


echo "<script language='javascript'>alert('Ha cerrado sesion correctamente, Gracias por su visita');

window.location='../index.php';
exit;
</script>";



?>