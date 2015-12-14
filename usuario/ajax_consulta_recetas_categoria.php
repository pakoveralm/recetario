<?php 
session_start();
require_once("../conexion/conectar.php");
require_once("../funciones/todasfunciones.php");

$cat=$_GET["q"];
$consulta="SELECT * FROM recetas WHERE recetas.id_categoria_receta='$cat'";
$resultado=mysql_query($consulta);

while($reg=mysql_fetch_array($resultado)){

	
	
	echo "<div id='categoria' style='border:solid 1px black;width:20%;height:20%;'>";
	echo "<img width='30%' height='30%' src='".$reg['foto']."'>";
	echo "<a href='detalles_receta.php?idr=".$reg['id_receta']."'>".ponerMayusculaPrimeraLetra($reg['nombre_receta'])."</a>";
	echo "</div>";

}
 ?>