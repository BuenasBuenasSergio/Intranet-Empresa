<?php 
	session_start();
	include("../conexion.php");

	mysqli_set_charset($conexion, "utf8");

	//Preparando la consulta
	$pr = $conexion->prepare("INSERT INTO trabajadores(dni , nombre, apellido,  telefono, fecNac, password, idPuesto, curriculum, contrato ) VALUES (?,?,?,?,?,?,?,?,?)");

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
	 	

		if(move_uploaded_file($fileTmpPath, $dest_path_CURR))
		{
	  		$message ='Curriculum Subido';
		}
		else
		{
	 		 $message = 'Curriculum No subido.';
		}


	

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
	 	

		if(move_uploaded_file($fileTmpPathCN, $dest_path_CN))
		{
	  		$messageCN ='Contrato Subido';
		}
		else
		{
	 		 $messageCN = 'Contrato No subido.';
		}

	

	//------------------------------------------------------------------//

	//now() para fecha actual.
	//realizando la asignacion de valores a los ? de la asignacion


	//"los ssss son los tipos de datos: s = string, i = integer" 
	$pr->bind_param("ssssssiss", $dni , $nombre, $apellidos, $telefono, $fecNac , $pass, $puesto, $dest_path_CURR, $dest_path_CN);

	//$sql = "INSERT INTO trabajadores(dni , nombre, apellido,  telefono, fecNac, password, idPuesto, curriculum, contrato ) VALUES ('$dni' , '$nombre', '$apellidos', '$telefono', '$fecNac' , '$pass', $puesto, '$dest_path_CURR', '$dest_path_CN')";


	/*mysqli_query($conexion, $sql) or die ("Error en la consulta $sql");
	mysqli_close($conexion); */

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alta Trabajador</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="../favicon.ico">    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	function volver() {
    		window.history.back();
    	};
    	function volverM() {
    		window.open("menuPersonal.php","_parent");
    	};
    	function volverV() {
    		window.open("verTrabajadores.php","_parent");
    	};
    </script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="../assets/plugins/prism/prism.css">
    <link rel="stylesheet" href="../assets/plugins/lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" href="../assets/plugins/elegant_font/css/style.css">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="../assets/css/styles.css">
</head> 

<body class="body-green">
        <!-- ******Header****** -->
        <div class="page-wrapper">
        <header id="header" class="header">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">
                        <a href="index.html">
                            <span aria-hidden="true" class="icon_documents_alt icon"></span>
                            <span class="text-highlight">Movi</span><span class="text-bold">Control</span>
                        </a>
                    </h1>
                </div><!--//branding-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../principal.php">Pagina Principal</a></li>
                    <li class="breadcrumb-item"><a href="menuPersonal.php">Personal</a></li>
                    <li class="breadcrumb-item active">Nuevo Trabajador</li>

                </ol>
            </div><!--//container-->
        </header><!--//header-->
        
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                </div><!--//doc-header-->
                <div class="doc-body row justify-content-md-center" >
                    <div class="doc-content col-md-9 col-12 order-1">
                        <div class="content-inner">
                            <section id="dashboards" class="doc-section">
                                <div class="section-block text-center">
                                	<div class="col-12" ></div>
                                	<div class="col-12" ></div>
                                	<div class="col-12" ></div>
                                	<div class="col-12" ></div>	
                                	<?php 
                                	if($pr->execute()){
		
										//Datos insertados...
										
										echo 'Datos agregados correctamente.';
										//echo "<SCRIPT>window.open('menuPersonal.php','_parent')</SCRIPT>";	
										$pr->close();
										
									} else {
										
										echo 'Error al realizar la consulta: ';
										$pr->close();
	}
                                	 ?>
                                	 <br><br>
                                	 <button type="button" class="btn btn-info" onclick="volver()">Volver Atras</button>
                                	 <button type="button" class="btn btn-info" onclick="volverM()">Volver Menu Principal</button>
                                	 <button type="button" class="btn btn-info" onclick="volverV()">Ver Trabajadores</button>
                                	 
                                </div><!--//section-block-->
                            </section><!--//doc-section-->
                        </div><!--//content-inner-->
                    </div><!--//doc-content-->
                </div><!--//doc-body-->              
            </div><!--//container-->
        </div><!--//doc-wrapper-->
    
    <footer id="footer" class="footer text-center">
        <div class="container">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Movicontrol</small>
        </div><!--//container-->
    </footer><!--//footer-->
    
     
    <!-- Main Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/prism/prism.js"></script>    
    <script type="text/javascript" src="assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>  
    <script type="text/javascript" src="assets/plugins/lightbox/dist/ekko-lightbox.min.js"></script>      
    <script type="text/javascript" src="assets/plugins/stickyfill/dist/stickyfill.min.js"></script>                                                              
    <script type="text/javascript" src="assets/js/main.js"></script>
    
</body>
</html>