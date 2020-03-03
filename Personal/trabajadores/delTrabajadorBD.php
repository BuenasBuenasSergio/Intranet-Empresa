<?php 
session_start();

//Recuperando datos del login


include("../../conexion.php");

$dni = $_GET['dni'];

if ($_SESSION['nombre'] == null) {
	header("location:..\index.php");
}

?>

<?php

    $sql = "DELETE  FROM trabajadores WHERE dni = '$dni'";
    $registros=mysqli_query($conexion,$sql);
	mysqli_close($conexion);

echo "<SCRIPT>window.open('../verTrabajadores.php','_parent')</SCRIPT>";  

 ?>