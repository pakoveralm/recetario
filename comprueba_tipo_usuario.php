<?php
session_start();

require_once("conexion/conectar.php");
//comprobamos que no van vacios los campos del formulario
if(empty($_POST["nickname"]) OR empty($_POST["contrasena"]))
{

	echo"<script type='text/javascript'>alert('Ha dejado un campo vacío en el formulario de acceso.Intentelo de nuevo');
			window.location='index.php';
	 </script> ";
}
else
{

$usu=$_POST["nickname"];
$con=$_POST["contrasena"];
//como no estan vacios, realizamos la consulta para ver si el usuario existe o no y redirigirlo a su pagina correspondiente	
$consulta="SELECT nickname,id_tipousuario FROM usuarios WHERE usuarios.nickname='$usu' AND usuarios.contrasena='$con'";
$resultado=mysql_query($consulta);

	if(mysql_num_rows($resultado))
	{

		if($reg=mysql_fetch_array($resultado))
		{

				if($reg["id_tipousuario"] == 1)
				{

					$_SESSION['nombre_usuario_sesion']=$reg["nickname"];
					$_SESSION['tipo_usuario_sesion']=$reg["id_tipousuario"];
					$_SESSION['autentificado']="si";
					header("Location:administrador/index_administrador.php");
					exit();
				}

				if($reg["id_tipousuario"] == 2)
				{

					$_SESSION['nombre_usuario_sesion']=$reg["nickname"];
					$_SESSION['tipo_usuario_sesion']=$reg["id_tipousuario"];
					$_SESSION['autentificado']="si";
					header("Location:usuario/index_usuario.php");
					exit();
				}


		}

	}
	else
	{

	echo"<script type='text/javascript'>alert('El usuario o contraseña que ha introducido no son correctos.Intentelo de nuevo');
		window.location='index.php';
			</script> ";
	}

}

?>