<?php 
session_start();

//Recuperando datos del login
$user = $_POST['user'];
$pass = $_POST['pass'];

include("conexion.php");

// Creamos la consulta
	$sql = "SELECT * FROM trabajadores WHERE dni = '$user'";

	$registros=mysqli_query($conexion,$sql);

	$total=mysqli_num_rows($registros);

	if ($total == 0)
		echo "Este usuario no existe.<br/><a href='index.php'>Volver al login.</a>";
	else
	{
		// El usuario existe y comprobamos su clave
		$linea=mysqli_fetch_array($registros);
		if ($pass!=$linea['password'])
			echo "Contraseña errónea.<br/><a href='index.php'>Volver al login.</a>";
		else
		{
			// El usuario y clave son correctos, actualizamos el ultimo acceso y recuperamos variables 
			$_SESSION['nombre']=$linea['nombre'];
			$_SESSION['dni']=$linea['dni'];
			
			header("location:principal.php");
		} // fin del else
	} // fin del else

 ?>