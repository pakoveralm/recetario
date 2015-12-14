<?php 
session_start();
require_once("../conexion/conectar.php");
require_once("../funciones/todasfunciones.php");
$id=$_GET["idr"];
 
$consulta="SELECT * FROM recetas WHERE id_receta='$id'";
$resultado=mysql_query($consulta);
$array_recetas[]=array();
while($registro=mysql_fetch_array($resultado))
{
	
	$array_recetas["nombre_receta"]=$registro["nombre_receta"];
	$array_recetas["foto"]=$registro["foto"];
	$array_recetas["numero_unidades"]=$registro["numero_unidades"];
	$array_recetas["numero_personas"]=$registro["numero_personas"];
	$array_recetas["tiempo_elaboracion"]=$registro["tiempo_elaboracion"];
	$array_recetas["preparacion"]=$registro["preparacion"];
}

$coningrediente="SELECT tiene.id_receta,ingredientes.nombre_ingrediente,ingredientes.unidad_medida,tiene.cantidad FROM tiene,recetas,ingredientes WHERE (tiene.id_receta='$id' AND recetas.id_receta=tiene.id_receta AND ingredientes.id_ingrediente=tiene.id_ingrediente)";
$resu=mysql_query($coningrediente);

		 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<h1><?php echo ponerMayusculaPrimeraLetra($array_recetas["nombre_receta"]); ?></h1>
		<h2>Ingredientes</h2>
		<ul>
			<?php
			while($reg=mysql_fetch_array($resu)){

			
				
				?>
			<li><?php echo $reg["cantidad"]."&nbsp;".$reg["unidad_medida"]." de ". $reg["nombre_ingrediente"]; ?></li>

			<?php } ?>
		</ul>


		<h2>Preparación</h2>
		<p align="center"><?php echo $array_recetas["preparacion"]; ?></p>
		
	</body>
</html>