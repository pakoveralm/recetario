<!DOCTYPE html>
 <?php 
session_start();
$_SESSION["array_ingredientes"]=array();
 ?>
 <html lang="es">
	 <head>
	 	<meta charset="UTF-8">
	 	<title>Document</title>
	 </head>
	 <body>
	 	<a href="insertar_nueva_receta.php">Insertar una receta</a>
	 	<a href="modificar_receta.php">Modificar una receta</a>
	 	<a href="borrar_receta.php">Borrar una receta</a>
	 <h1>Bienvenido usuario</h1>
	 Aquí podrá modificar las recetas

	<a href="cerrar_sesion.php" title="">Cerrar sesion</a>
	 </body>
 </html>