<?php
$conexion=mysql_connect("localhost","root","") OR die("No se puede conectar con la base de datos");

mysql_select_db("recetario",$conexion) OR die("No se puede conectar con la base de datos");
?>