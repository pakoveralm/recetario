<?php 
session_start();



$nombre=$_POST["nom"];

$id_ingrediente=$_POST["ing"];
$cantidad=$_POST["cant"];
$unidad=$_POST["uni"];
// echo $id_ingrediente;


if(isset($_SESSION["array_ingredientes"]))
{
	$aingredientes=$_SESSION["array_ingredientes"];
}

$aingredientes[]=array('id_ingrediente'=>$id_ingrediente,'nombre_ingrediente'=>$nombre,'cantidad'=>$cantidad,'unidad_medida'=>$unidad);
$_SESSION["array_ingredientes"]=$aingredientes;

if(isset($_SESSION["array_ingredientes"]))
{
	$_SESSION["array_ingredientes"]=$aingredientes;
}
//header("Location:insertar_ingredientes.php");

 // if(is_array($aingredientes))
	// 	 {
		 	
	// 		foreach($aingredientes as $clave => $contenido)
	// 		{
				
	// 			echo "<li>".$contenido['cantidad']." ".$contenido['unidad_medida']." ".$contenido['nombre_ingrediente']." "."<a href='borrar_ingredientes_receta.php?cla=$clave'><img width='15' src='../img/eliminar.jpg'</a> "."</li>";
	// 			echo $clave; 
	// 		 }
	// 	}
 ?>
