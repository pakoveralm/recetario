<?php 
require_once("../conexion/conectar.php");
$id_receta=$_REQUEST["id_receta"];

$consulta=mysql_query("DELETE FROM recetas WHERE id_receta='$id_receta'");

echo "Receta borrada correctamente<br>";

echo "<a href='index_administrador.php' title='Inicio administrador'>Inicio</a>";
 ?>
