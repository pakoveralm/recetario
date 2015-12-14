<?php 
require_once("../conexion/conectar.php");

$cat=$_REQUEST["ci"];

$consulta=mysql_query("SELECT * FROM ingredientes WHERE id_tipo_ingrediente='$cat'");
echo "<form name='formulario_agregar'>";
while ($registro=mysql_fetch_assoc($consulta)) 
{
	echo "<div class='resultado_ingrediente'>";
	echo "<h3>".$registro['nombre_ingrediente']."</h3>";
	echo "<label>Cantidad</label><input type='number' name='cant' min='1' id='cantidad'>".$registro['unidad_medida']."<br>";
	
	echo "<input type='hidden' name='ing' id='id_ingrediente' value='".$registro['id_ingrediente']."'>";
	echo "<input type='hidden' name='nom' id='nombre_ingrediente' value='".$registro['nombre_ingrediente']."'>";
	echo "<input type='hidden' name='uni' id='unidad_medida' value='".$registro['unidad_medida']."'>";
	echo "<input type='button' value='Añadir' onclick='insertar_ingrediente_lista(formulario_agregar.cantidad.value)'>";
	echo "</div>";
}
echo "</form>";
 ?>