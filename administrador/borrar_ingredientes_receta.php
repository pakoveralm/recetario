<?php 
session_start();
$clave_ing=$_GET["cla"];
//echo $clave_ing;

if(isset($_SESSION["array_ingredientes"]))
{
	$aingredientes=$_SESSION["array_ingredientes"];

	if(is_array($aingredientes))
		 {
		 	
		unset($aingredientes[$clave_ing]);
		// unset($aingredientes[$clave_ing]["nombre_ingrediente"]);
		// unset($aingredientes[$clave_ing]["cantidad"]);
		// unset($aingredientes[$clave_ing]["unidad_medida"]);
		}

	$_SESSION["array_ingredientes"]=$aingredientes;
}


header("Location:insertar_ingredientes.php");
 ?>