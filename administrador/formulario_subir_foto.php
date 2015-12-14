<!DOCTYPE html>
<?php 
$id_receta=$_REQUEST["id_receta"];
 ?>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<form method="POST" action="subir_foto.php" enctype="multipart/form-data">
			<input type="file" name="file"><br>
			<input type="hidden" name="idreceta" value="<?php echo  $id_receta ?>">
			<input type="submit" value="Subir foto">
		</form>
	</body>
</html>