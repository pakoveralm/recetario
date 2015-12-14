<!DOCTYPE html>
<html lang="es">
<?php 
session_start();

echo $_SESSION["nombre_usuario_sesion"];

require_once("../conexion/conectar.php");
$consulta_cat_ing=mysql_query("SELECT * FROM tipos_ingredientes");
 ?>
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script type="text/javascript">
		/*funcion que carga las categorias de ingredientes
		en el buscador*/
		function buscar_ingredientes(str)
		{
					var cat_ing=document.getElementById("categoria_ingrediente").value;
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
							document.getElementById("ingredientes").innerHTML=xmlhttp.responseText;
						}
					}
		
						xmlhttp.open("POST","ajax_mostrar_ingredientes.php",true);
						xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xmlhttp.send("ci="+cat_ing);
						//ejemplo para mandar variables xmlhttp.send("t="+texto); 
		
		}

		/*funcion para cargar los ingredientes en la lista*/
		 function insertar_ingrediente_lista(str2)
		 {
		 			var xmlhttp;
		 			var ingrediente=document.getElementById("id_ingrediente").value;
		 			//alert(ingrediente);
		 			var cantidad=str2;
		 			alert(cantidad);
		 			var nombre=document.getElementById("nombre_ingrediente").value;
		 			var umedida=document.getElementById("unidad_medida").value;

		 			if(str2 == "")
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
		 					//document.getElementById("lista_ingredientes").innerHTML=xmlhttp.responseText;
		 					//document.getElementById("formulario_agregar").reset();
		 					alert("Ingrediente añadido");
		 					//document.body.location.reload();
		 					//recargar_pagina();
		 				}
		 			}
		
		 				xmlhttp.open("POST","ajax_agregar_ingredientes_receta.php",true);
		 				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 				 xmlhttp.send("ing="+ingrediente+"&cant="+cantidad+"&nom="+nombre+"&uni="+umedida);
		 				//ejemplo para mandar variables xmlhttp.send("t="+texto); 
		 				// ejemplo de mandar varios datos por post xmlhttp.send("ing="+ingrediente+"&cant="+cantidad+"&nom="+nombre+"&uni="+umedida);
		 }

		 function muestra_lista(str)
		 {
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
		 					document.getElementById("lista_ingredientes").innerHTML=xmlhttp.responseText;
		 				}
		 			}
		 
		 				xmlhttp.open("POST","mostrar_ingredientes_receta.php",true);
		 				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 				xmlhttp.send();
		 				//ejemplo para mandar variables xmlhttp.send("t="+texto); 
		 
		 }
		 function recargar_pagina(){

		 	document.location.reload();
		 }

		</script>
	</head>
	<body>
		<h1>Insertar receta</h1>
		<h2>Insertar ingredientes</h2>

	<form>
		<select id="categoria_ingrediente">
			<?php 
				while($reg=mysql_fetch_assoc($consulta_cat_ing))
				{
					echo "<option value='".$reg['id_tipo_ingrediente']."'>".$reg['nombre_tipo_ingrediente']."</option>";
				}
			 ?>

		</select>
		<input type="button" value="Buscar" onclick="buscar_ingredientes()"><br>
		<input type="button" value="Ver ingredientes añadido" onclick="muestra_lista()">
	</form>
	<div id="lista_ingredientes">
		
	</div>
	<div id="ingredientes">
		<!-- Aquí se muestran los ingredientes que se 
		pueden seleccionar utilizando la consulta de 
		ajax -->
	</div>
	</body>
</html>