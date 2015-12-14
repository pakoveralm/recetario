<?php 
require_once("../conexion/conectar.php");
//variables
$nombre_comida=$_REQUEST["ncomi"];
$tiempo_elaboracion=$_REQUEST["tiempo_elabora"];
$preparacion=$_REQUEST["prep"];
$numero_personas=$_REQUEST["numeroper"];
$numero_unidades=$_REQUEST["numerouni"];
$categoria=$_REQUEST["categoria"];

if($numero_personas != null)
{

	$consulta="INSERT INTO recetas VALUES('','$nombre_comida','','','','$numero_personas','$tiempo_elaboracion','$preparacion','$categoria',1)";
	$resultado=mysql_query($consulta);
	echo "consulta ejecutada correctamente";
}
else
{
	$consulta="INSERT INTO recetas VALUES('','$nombre_comida','','','$numero_unidades','','$tiempo_elaboracion','$preparacion','$categoria',1)";
	$resultado=mysql_query($consulta);
	echo "consulta ejecutada correctamente";
}

$ultimoid=mysql_insert_id($conexion);

echo "Receta insertada correctamente<br>";
echo "¿Desea subir una foto?<br>";
echo "<a href='formulario_subir_foto.php?id_receta=$ultimoid'>S&iacute</a>";
echo "<a href='index_administrador.php'>No</a>";



 ?>