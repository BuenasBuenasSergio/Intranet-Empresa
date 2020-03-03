<?php
session_start();

include("../conexion.php");

//si no esta ioniciada la sesion se cambia manda al index
if ($_SESSION['nombre'] == null) {
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nuvo Trabajador</title>
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
        <div class="doc-wrapper">
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                    <h1 class="doc-title">Nuevo Trabajador</h1>
                </div><!--//doc-header-->
                <div class="doc-body row justify-content-md-center" >
                    <div class="doc-content col-md-9 col-12 order-1">
                        <div class="content-inner">
                            <section id="dashboards" class="doc-section">
                                <div class="section-block">
                                    <form name="alta" method="POST" enctype="multipart/form-data" action="altaTrabajador.php">
                                        <div class="form-group row justify-content-md-center">
                                            <label  class="col-sm-2 form-control-label">Nombre</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nombre" placeholder="nombre">
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-md-center">
                                            <label  class="col-sm-2 form-control-label">Apellidos</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-md-center">
                                            <label  class="col-sm-2 form-control-label">DNI</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="dni" placeholder="DNI">
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-md-center">
                                            <label  class="col-sm-2 form-control-label">Telefono</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="telefono" placeholder="Numero telefono">
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-md-center">
                                            <label  class="col-sm-2 form-control-label">Puesto</label>
                                            <div class="col-sm-10">
                                                <select class="custom-select" name="puesto">
                                                    <option selected>Selecciona Un Puesto</option>
                                                    <?php

                                                        $sql = "SELECT * FROM puestos";

                                                         $registros=mysqli_query($conexion,$sql);

                                                         while ($linea=mysqli_fetch_array($registros)) {
                                                            echo "
                                                            <option value='$linea[idPuesto]'>$linea[puesto]</option>";
                                                         }
                                                     ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-md-center">
                                            <label  class="col-sm-2 form-control-label">Fecha Nacimiento</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="date"  name="fecNac" placeholder="FecNac">
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-md-center">
                                            <label  class="col-sm-2 form-control-label">Contraseña</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"  name="pass" placeholder="Contraseña">
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-md-center">
                                            <label  class="col-sm-2 form-control-label">Curriculum</label>
                                            <div class="col-sm-10">
                                                 <input type="file" id="file" name="curriculum" />
                                                <span class="file-custom"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-md-center">
                                            <label for="inputEmail3" class="col-sm-2 form-control-label">Contrato</label>
                                            <div class="col-sm-10">
                                                 <input type="file" id="file" name="contrato" />
                                                <span class="file-custom"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-md-center">
                                            <div class="col-sm-offset-6 ">
                                                <button type="submit" class="btn btn-primary">Introducir Nuevo Trabajador</button>
                                            </div>
                                        </div>
                                    </form>
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