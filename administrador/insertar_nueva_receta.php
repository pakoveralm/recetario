<!DOCTYPE html>
<html lang="es">
<?php 
	require_once("../conexion/conectar.php");
	$consulta="SELECT * FROM categorias_recetas";
	$resultado=mysql_query($consulta);
 ?>
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script type="text/javascript">
			function botonseleccionado()
			{
				//alert("hola");

				var btn1=document.getElementById("rbunidades");
				var btn2=document.getElementById("rbnumeropersonas");

				if(btn1.checked){
					document.getElementById("textnpersonas").style.visibility="hidden";
					document.getElementById("textnunidades").style.visibility="visible";

				}
				if(btn2.checked){
					document.getElementById("textnunidades").style.visibility="hidden";
					document.getElementById("textnpersonas").style.visibility="visible";
				}
				
			}

			function subir_foto(str)
			{
				var archivo=document.getElementById("file").value;
				
				
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
								document.getElementById("resultado").innerHTML=xmlhttp.responseText;
							}
						}
							//variable a pasar por post
							
							xmlhttp.open("POST","subir_foto.php",true);
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							//ejemplo para mandar variables xmlhttp.send("t="+texto); 
			}
		</script>
	</head>
	<body>
		<h2>Nueva receta</h2>
		<form id="form" action="insertar_ingredientes.php" method="POST">
			
			<label>Nombre de la receta:</label>&nbsp;<input type="text" name="ncomi" id="ncomi" placeholder="Nombre de la comida"><br>
			<label>Tiempo de elaboracion:</label>&nbsp;<input type="number" name="tiempo_elabora" id="tela" placeholder="Tiempo de elaboración"><br>
			<label>Preparación:</label>&nbsp;<textarea id="prep" name="prep" placeholder="Preparación"></textarea><br><br>
			<input type="radio" name="personas" id="rbunidades" onchange="botonseleccionado()">Número de unidades:&nbsp;<input type="number" id="textnunidades" name="numerouni"  placeholder="Nº de unidades" style="visibility: hidden;"><br>
			<input type="radio" name="personas" id="rbnumeropersonas" onchange="botonseleccionado()">Nº de personas:&nbsp;<input type="number" id="textnpersonas" name="numeroper" placeholder="Nº de personas" style="visibility: hidden;"><br>
			

			<label>Seleccione la categoria de la receta:</label><select name="categoria">
			<?php
			while($reg=mysql_fetch_assoc($resultado))
			{
				//$nombre_cat=ponerMayusculaPrimeraLetra($reg["nombre_categoria_receta"]);	
				echo "<option value='".$reg['id_categoria_receta']."'>".$reg['nombre_categoria_receta']."</option>";
			}
				?>
			</select><br>
			<input type="submit" value="Insertar receta">
			<!-- <a href="index_administrador.php#prueba2" title="">Ir a inicio</a> -->
		<!--</form>
		<form enctype="multipart/form-data">
			<input type="file" id="file" name="file" value="Buscar">
			 <input type="text" id="prueba"> 
			<input type="button" onclick="subir_foto()" value="Subir imagen">
		</form>-->
		
	</body>
</html>