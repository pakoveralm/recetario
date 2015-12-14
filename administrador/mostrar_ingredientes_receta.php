<?php
session_start();

if(isset($_SESSION["array_ingredientes"]))
{
	

	if(is_array($_SESSION["array_ingredientes"]))
		 {
		 	
			foreach($_SESSION["array_ingredientes"] as $clave => $contenido)
			{
				
				echo "<li>".$contenido['cantidad']." ".$contenido['unidad_medida']." ".$contenido['nombre_ingrediente']."</li><br>";
				echo "<a href='borrar_ingredientes_receta.php?cla=$clave'><img width='15' src='../img/eliminar.jpg'</a>"; 
			 }
		}
}
 //Obtenemos la página en la que nos encontramos
//$self = $_SERVER['PHP_SELF'];

//Refrescamos cada 300 segundos
//header("refresh:10; url=$self"); 

//header("Location:insertar_ingredientes.php");

 
?>