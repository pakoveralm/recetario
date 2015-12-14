<?php 
session_start();
require_once("../conexion/conectar.php");

//variables
$id_receta=$_POST["id_receta"];
$nombrereceta=$_POST["nombre_receta"];
$numerounidades=$_POST["numero_unidades"];
$numeropersonas=$_POST["numero_personas"];
$tiempoela=$_POST["tiempo_elaboracion"];
$preparacion=$_POST["preparacion"];
$cat_receta=$_POST["select_categoria"];


$consulta="UPDATE recetas SET nombre_receta='$nombrereceta',numero_unidades='$numerounidades',numero_personas='$numeropersonas',tiempo_elaboracion='$tiempoela',preparacion='$preparacion',id_categoria_receta='$cat_receta' WHERE id_receta='$id_receta'";
$resultado=mysql_query($consulta);

echo "Registro actualizado correctamente";

 ?>