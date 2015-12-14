<?php 
session_start();
require_once("../conexion/conectar.php");
require_once("../funciones/todasfunciones.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script src="../js/funciones_ajax.js"></script>
		<script type="text/javascript">
		
		/*funcion que comprueba que boton radio esta
		seleccionado para mostrar la entrada de texto*/
		function validaradio()
		{

			
			var cat=document.getElementById("rbcategorias");
			var nom=document.getElementById("rbnombre");
			var ing=document.getElementById("rbingrediente");
			//alert("hola");
			
					
			if(cat.checked)
			{
			document.getElementById("buscador_categorias").style.visibility ='visible';
			document.getElementById("resultado_nombres").style.visibility="hidden";
			document.getElementById("resultado_categorias").style.visibility="visible";
			}
			else
			{
			document.getElementById("buscador_categorias").style.visibility ='hidden';					
			}

			if(nom.checked)
			{
			document.getElementById("buscador_nombre").style.visibility="visible";
			document.getElementById("resultado_nombres").style.visibility="visible";
			document.getElementById("resultado_categorias").style.visibility="hidden";
			}
			else
			{
			document.getElementById("buscador_nombre").style.visibility="hidden";
			}

			if(ing.checked)
			{
			document.getElementById("buscador_ingrediente").style.visibility="visible";
			}
			else
			{
			document.getElementById("buscador_ingrediente").style.visibility="hidden";
			}
			
		}

		
		</script>
	</head>
	<body>
		<div>
		<h1>Bienvenido usuario</h1> 

		<a href="index_usuario.php">Inicio</a><br>
		<a href="">Sugerencias según disposición de ingredientes</a><br>
		¿Cómo desea realizar su búsqueda?
		
		<form name="formu_buscador">
		<input type="radio" name="busqueda"  id="rbcategorias" value="categorias" onchange="validaradio()">Búsqueda por categorías
		<input type="radio" name="busqueda" value="Busqueda por nombre" id="rbnombre" onchange="validaradio()">Búsqueda por nombre
		
		</form>
		</div>

		<div id="buscador_categorias" style="visibility:hidden;">
			<select name="selector_categoria_comida" onchange="muestracomida(this.value)" >
					<?php 
					$consulta="SELECT * FROM categorias_recetas";
					$resultado=mysql_query($consulta);
					while($reg=mysql_fetch_array($resultado))
					{

					?>
					<option value="<?php echo $reg["id_categoria_receta"]; ?>"><?php echo ponerMayusculaPrimeraLetra($reg["nombre_categoria_receta"]); ?></option>
					<?php
					}
					 ?>
				
				
			</select>
		</div>

		<div id="buscador_nombre" style="visibility:hidden;">
			<label>Inserte el nombre de la comida:&nbsp;</label><input type="text" id="buscador_nombre" onkeyup="muestranombrescomida(this.value)"  placeholder="Nombre de la comida">
		</div>

		<div id="buscador_ingrediente" style="visibility:hidden;">
			<select></select>
			<select></select>
		</div>
		
		<!--dentro de esta capa se muestran los resultados de la eleccion-->
		<div id="resultado_categorias" style="border-color: solid 4px green; margin-top:40px;">
			
		</div>
		<div id="resultado_nombres">
			
		</div>

	</body>
</html>