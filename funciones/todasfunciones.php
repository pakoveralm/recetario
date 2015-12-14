<?php 

function ponerMayusculaPrimeraLetra($palabrap)
{

		//$letra_minuscula=substr($reg["nombre_ingrediente"],0,1);
				//$resto_palabra=substr($reg["nombre_ingrediente"],1);
				//$letra=strtoupper($letra_minuscula);
				//$nombre=$letra.$resto_palabra;
				//$posicion=strpos($nombre,$letra_minuscula);
				//$nombre=substr_replace($nombre,$letra,0,0);
	
	$letra_minuscula=substr($palabrap,0,1);
	$letra_mayuscula=strtoupper($letra_minuscula);
	$resto_palabra=substr($palabrap,1);
	$palabra_final=$letra_mayuscula.$resto_palabra;

	return $palabra_final;
}

 ?>