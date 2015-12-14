<?php 
require_once("../conexion/conectar.php");
require_once("../funciones/todasfunciones.php");
$sugerencia=$_GET["n"];
//el porcentaje permite buscar registros que coincidan con unos determinados caracteres
$sugerencia=$sugerencia."%";
$consulta="SELECT id_receta,nombre_receta,foto FROM recetas WHERE nombre_receta LIKE '$sugerencia'";
$resultado=mysql_query($consulta);

while($reg=mysql_fetch_array($resultado)){

	echo "<div id='items_resultado_nombre' style='border: solid 1px red'>";
	echo "<img width='40px' height='40px' src='".$reg['foto']."'>";
	echo "<a  href='detalles_receta.php?idr=".$reg['id_receta']."'>".ponerMayusculaPrimeraLetra($reg['nombre_receta'])."</a>";
	echo "</div>";
}


 ?>