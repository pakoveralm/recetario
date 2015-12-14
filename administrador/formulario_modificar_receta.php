<!DOCTYPE html>
<?php 
require_once("../conexion/conectar.php");

//variables
$id_receta=$_REQUEST["id_receta"];


//consultas
$consulta=mysql_query("SELECT * FROM recetas WHERE id_receta='$id_receta'");
$consulta_cat=mysql_query("SELECT * FROM categorias_recetas");


?>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script type="text/javascript">

			/*esta funcion es para desactivar uno de los campos, 
			cuando uno tenga informacion*/
			function desactiva_campo()
			{
				var personas=document.getElementById("numero_personas").value;
				var unidades=document.getElementById("numero_unidades").value;

				if(personas != "")
				{
					unidades.style.visibility="hidden";
				}
				if(unidades != "")
				{
					personas.style.visibility="hidden";
				}
			}
		</script>
	</head>
	<body onload="desactiva_campo()">
		<h1>Formulario modificación de recetas</h1>
		

	<div id="formulario">
		<form action="consulta_modificar_receta.php" method="POST">
		<?php  

			while ($reg=mysql_fetch_assoc($consulta)) 
			{
			?>
		<label for="nombre_receta">Nombre de la receta:</label><input type='text' name='nombre_receta' id="nombre_receta" value='<?php echo $reg["nombre_receta"]; ?>'><br>
		<label for="numero_unidades">Numero de unidades:</label><input type='number' name='numero_unidades' id="numero_unidades" value='<?php echo $reg["numero_unidades"]; ?>'><br>
		<label for="numero_personas">Numero de personas:</label><input type='number' name='numero_personas' id="numero_personas" value='<?php echo $reg["numero_personas"]; ?>'><br>
		<label for="tiempo_elaboracion">Tiempo de elaboración:</label><input type='number' name='tiempo_elaboracion' id="tiempo_elaboracion" value='<?php echo $reg["tiempo_elaboracion"]; ?>'><br>
		<label for="preparacion">Elaboración</label><textarea name='preparacion' id="preparacion" ><?php echo $reg['preparacion']; ?></textarea><br>
		<label for="select_categoria">Seleccione la categoría:</label><select name="select_categoria" id="select_categoria">		
				
				<?php
				/*select que carga las categorías de recetas
				y deja una por defecto*/
				$cat=$reg["id_categoria_receta"];
				$ncat=0;
				while($registro=mysql_fetch_assoc($consulta_cat))
				{
					if($cat == $registro["id_categoria_receta"])
					{
						$ncat=$registro["nombre_categoria_receta"];
						continue;
					}
					echo "<option  value='".$registro['id_categoria_receta']."'>".$registro['nombre_categoria_receta']."</option>";
				}	
				?>	
				<option selected="selected" value="<?php $reg['id_categoria_receta']; ?>"> <?php echo $ncat; ?></option>
				</select><br>
		<?php 
			}
		 ?>
		<input type="hidden" name="id_receta" value="<?php echo $id_receta; ?>">		 
		 <input type="submit" value="Modificar">
		</form>
	</div>
	</body>
</html>