<?php 
session_start();

if($_SESSION["tipo_usuario_sesion"] != 2){

	echo "El administrador no puede acceder aquí";
}
 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<div>
		<h1>Bienvenido usuario</h1> 

		<a href="buscar_recetas.php">Buscar recetas</a>
		<a href="">Sugerencias según disposición de ingredientes</a>
		</div>

		<div id="productos"></div>

	</body>
</html>