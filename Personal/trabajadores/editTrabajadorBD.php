<?php 
session_start();

//Recuperando datos del login
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$puesto = $_POST['puesto'];
$fecNac = $_POST['fecNac'];
$pass = $_POST['pass'];
$curriculum = $_POST['curriculum'];
$contrato = $_POST['contrato'];


include("../../conexion.php");

echo $nombre ;
echo $apellidos;
echo $dni ;
echo $telefono;
echo $puesto ;
echo $fecNac ;
echo $pass;
echo $curriculum ;
echo $contrato;

//now() para fecha actual.
//$sql = "INSERT INTO trabajadores(dni , nombre, apellido,  telefono, fecNac, password, idPuesto, curriculum, contrato ) VALUES ('$dni' , '$nombre', '$apellidos', '$telefono', '$fecNac' , '$pass', $puesto, '$curriculum', '$contrato')";

//mysqli_query($conexion, $sql) or die ("Error en la consulta $sql");
//mysqli_close($conexion);

//echo "<SCRIPT>window.open('trabajadores.php','_parent')</SCRIPT>";  

 ?>