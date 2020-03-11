<?php 
session_start();
include("../../conexion.php");

//preparando consulta

//Recuperando datos del login
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$puesto = $_POST['puesto'];
$fecNac = $_POST['fecNac'];
$pass = $_POST['pass'];
//$curriculum = $_POST['curriculum'];
//$contrato = $_POST['contrato'];

$pr = $conexion->prepare("UPDATE trabajadores SET dni=?,nombre=?,apellido=?,telefono=?,fecNac=?,password=?,idPuesto=? WHERE dni = '$dni'");


//now() para fecha actual.

$pr->bind_param("ssssssi", $dni , $nombre, $apellidos, $telefono, $fecNac , $pass, $puesto);

if($pr->execute()){
		
		//Datos insertados...
		
		if($pr->affected_rows==0){
		echo "Ninguna fila fue actualizada: ";
	} else
		echo "Datos actualizados correctamente.";

		$pr->close();
		
		echo "<SCRIPT>window.open('../verTrabajadores.php','_parent')</SCRIPT>";  
		
	} else {
		echo 'Error al realizar la consulta: '.$pr->error;
		$pr->close();
		//echo "<SCRIPT>window.history.back()</SCRIPT>";  
	}

//$sql = "UPDATE trabajadores SET dni='$dni',nombre='$nombre',apellido='$apellidos',telefono='$telefono',fecNac='$fecNac',password='$pass',idPuesto=$puesto WHERE dni = '$dni'";

//mysqli_query($conexion, $sql) or die ("Error en la consulta $sql");
//mysqli_close($conexion);



 ?>