<!DOCTYPE html>
<?php 
session_start();
//variables de session

require_once("../conexion/conectar.php");
//extract($_REQUEST);
$consulta_cat=mysql_query("SELECT * FROM categorias_recetas");

//$consulta_recetas=mysql_query("SELECT * FROM recetas WHERE id_categoria_receta='$categoria'");

?>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script type="text/javascript">
		function muestranombres(str)
		{
		var datos=document.getElementById("categoria").value;
		//alert(datos);
			var xmlhttp;

			if(str == "")
			{
				document.getElementById("txthint").innerHTML="";

				return;
			}

			if(window.XMLHttpRequest)
			{
				xmlhttp= new XMLHttpRequest();
			}
			else
			{
				xmlhttp= new ActiveXObjet("Microsoft.XMLHttp");
			}

			xmlhttp.onreadystatechange=function()
			{

				if(xmlhttp.readyState == 4 && xmlhttp.status==200)
				{
					//document.getElementById("cliente").innerHTML=xmlhttp.responseText;
					document.getElementById("resultado_nombres").innerHTML=xmlhttp.responseText;
					//document.location.reload();
				}
			}

				xmlhttp.open("POST","ajax_mostrar_nombres_recetas_borrar_receta.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("data="+datos);

}
		</script>
	<body>
		<h1>Borrar receta</h1>

		<!--Barra busqueda recetas por categoria(select)-->
		<form name="formu">
			<select name="categoria" id="categoria">
				<?php
				while($reg=mysql_fetch_assoc($consulta_cat))
				{
					?>

				<option value="<?php echo $reg['id_categoria_receta'] ?>"><?php echo $reg['nombre_categoria_receta'] ?></option>
				<?php	
				}
				?>
			</select>
			<input type="button" onclick="muestranombres()" value="Buscar">
		</form>

		<!-- Tabla para mostrar las recetas -->
		<table>
			<tr>
				<td>Nombre de la receta</td>
				<td>Numero de unidades</td>
				<td>Numero de personas</td>
				<td>Tiempo de elaboración</td>
				<td>Preparación</td>
				<td>Opciones</td>
			</tr>
			<tr id="resultado_nombres">
			
				<!-- Las colummnas se mostraran con una 
				consulta en ajax. ajax_mostrar_nombres_recetas_borrar_recetas.php -->
			</tr>
			</table>
		</body>
</html>