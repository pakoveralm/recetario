<?php 

$ingredientes=array("nombre"=>"paco","edad"=>"25");

foreach($ingredientes as $clave => $contenido)
{
	if(is_array($ingredientes) && isset($ingredientes["nombre"]))
	{
		echo $ingredientes["edad"];
	}
}
 ?>