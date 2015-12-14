<?php 
session_start();
require_once("../conexion/conectar.php");

$datos=$_POST["data"];
//echo $datos;

$consulta="SELECT * FROM recetas WHERE id_categoria_receta='$datos'";
$resultado=mysql_query($consulta);

while ($reg=mysql_fetch_assoc($resultado)) 
{
	echo "<td>".$reg['nombre_receta']."</td>";
	echo "<td>".$reg['numero_unidades']."</td>";
	echo "<td>".$reg['numero_personas']."</td>";
	echo "<td>".$reg['tiempo_elaboracion']."</td>";
	echo "<td>".$reg['preparacion']."</td>";
	$id=$reg["id_receta"];
	echo "<td><a href='formulario_modificar_receta.php?id_receta=$id'>Modificar receta</a><br>
				<a href='formulario_subir_foto.php?id_receta=$id'>Subir foto</a>		
	</td>";
}


 ?>