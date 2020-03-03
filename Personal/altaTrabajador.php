<?php 
session_start();
include("../conexion.php");

//Recuperando datos del login
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$puesto = $_POST['puesto'];
$fecNac = $_POST['fecNac'];
$pass = $_POST['pass'];

//--------------------------------------------------------
//Subida Curriculum
$fileTmpPath = $_FILES['curriculum']['tmp_name'];
$fileName = $_FILES['curriculum']['name'];
$fileSize = $_FILES['curriculum']['size'];
$fileType = $_FILES['curriculum']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$newFileName = 'curriculum_' . $nombre . '_' . $apellidos .  '.' . $fileExtension;

	$uploadFileDir = 'files/curriculums/';
	$dest_path_CURR = $uploadFileDir . $newFileName;
 	echo "$dest_path_CURR";

	if(move_uploaded_file($fileTmpPath, $dest_path_CURR))
	{
  		$message ='Curriculum Subido';
	}
	else
	{
 		 $message = 'Curriculum No subido.';
	}


echo "<br>";

echo "$message";

//------------------------------------------------------------------//

//--------------------------------------------------------
//Subida Contrato
$fileTmpPathCN = $_FILES['contrato']['tmp_name'];
$fileNameCN = $_FILES['contrato']['name'];
$fileSizeCN = $_FILES['contrato']['size'];
$fileTypeCN = $_FILES['contrato']['type'];
$fileNameCmpsCN = explode(".", $fileNameCN);
$fileExtensionCN = strtolower(end($fileNameCmpsCN));

$newFileNameCN = 'contrato_' . $nombre . '_' . $apellidos .  '.' . $fileExtensionCN;

	$uploadFileDirCN = 'files/contratos/';
	$dest_path_CN = $uploadFileDirCN . $newFileNameCN;
 	echo "$dest_path_CN";

	if(move_uploaded_file($fileTmpPathCN, $dest_path_CN))
	{
  		$messageCN ='Contrato Subido';
	}
	else
	{
 		 $messageCN = 'Contrato No subido.';
	}


echo "<br>";

echo "$messageCN";

//------------------------------------------------------------------//

//now() para fecha actual.
$sql = "INSERT INTO trabajadores(dni , nombre, apellido,  telefono, fecNac, password, idPuesto, curriculum, contrato ) VALUES ('$dni' , '$nombre', '$apellidos', '$telefono', '$fecNac' , '$pass', $puesto, '$dest_path_CURR', '$dest_path_CN')";

mysqli_query($conexion, $sql) or die ("Error en la consulta $sql");
mysqli_close($conexion);

//echo "<SCRIPT>window.open('menuPersonal.php','_parent')</SCRIPT>";  

 ?>