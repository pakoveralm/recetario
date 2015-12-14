<?php
require_once("../conexion/conectar.php");
$id_receta=$_REQUEST["idreceta"];

//$archivo=$_POST["ar"];
//$file=$_FILES["ar"]["name"];
//echo "soy $";
//$fami=$_REQUEST['familia'];
// Este script permite subir a la carpeta "datos" del servidor
// imágenes y hojas de cálculo cuyo tamaño sea inferior a 50 Mb.

$allowedExts = array("gif", "jpeg", "jpg", "png","xls");
// Aquí se declaran las extensiones de archivo válidas, que no
// gif, jpeg, jpg, png para imágenes y xls, para hojas de cálculo.


$temp = explode(".", $_FILES["file"]["name"]);
// la función explode separa el nombre del fichero en nombre 
//y extensión. $temp será un array con esos dos valores.

$extension = end($temp);
// $extension contendrá el último elemento del array anterior,
// que se corresponde con la extensión del fichero.

//A continuación se comprueba el tipo mime del archivo
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png")
// application/octet-stream es el tipo mime de la hoja de cálculo
|| ($_FILES["file"]["type"] == "application/octet-stream")) 
// ahora se comprueba el tamaño en bytes aproximado
&& ($_FILES["file"]["size"] < 5000000000000)
// y que la extensión sea la una de las permitidas
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
	// visualiza los datos del archivo
    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("datos/" . $_FILES["file"]["name"]))
      {
	  // si el fichero ya existe en la carpeta "datos"...
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
	  // si no hay ningún error y el fichero es válido
	  // se mueve de la carpeta temporal a la carpeta "datos".
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../img/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "img/" . $_FILES["file"]["name"]."<br>";
	  // Ahora intento abrirlo con la librería para trabajar
	  // con hojas de datos
      
      
      
      
      $ruta="../img/".$_FILES["file"]["name"];
      //Conectamos a la base de datos
       
$sql=mysql_query("UPDATE recetas SET foto='$ruta' WHERE id_receta='$id_receta'");
echo "<a href='index_administrador.php'>Volver al menu principal</a>";
	  
      }
    }
  }
else
  {
  echo "Imagen inválida";
  }
?>