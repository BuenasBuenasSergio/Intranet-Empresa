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
    <title>Datos Trabajadores</title>
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
                    <li class="breadcrumb-item"><a href="../principal.html">Pagina Principal</a></li>
                    <li class="breadcrumb-item"><a href="../personal.html">Personal</a></li>
                    <li class="breadcrumb-item active">Trabajadores</li>
                </ol>
            </div><!--//container-->
        </header><!--//header-->
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                    <h1 class="doc-title">Trabajadores</h1>
                </div><!--//doc-header-->
                <div class="doc-body row justify-content-md-center">
                    <div class="doc-content ">
                        <div class="content-inner">
                            <section id="dashboards" class="doc-section">
                                <div class="section-block">
                                    <div>
                                        <!--Recoginedo datos de los empleados-->
                                        <?php

                                            $sql = "SELECT t.nombre,t.apellido,t.dni, t.fecNac, p.puesto, t.curriculum, t.contrato FROM trabajadores as t, puestos as p WHERE t.idPuesto = p.idPuesto";
                                             //PAGINACION PT1________________---------------_________________________

                                            $url = basename($_SERVER ["PHP_SELF"]);

                                            if (isset($_GET['pos']))
                                            
                                              $ini=$_GET['pos'];
                                            
                                            else
                                            
                                              $ini=1;


                                            $count="SELECT COUNT(*) FROM trabajadores";
                                            $limit_end = 5;
                                            
                                            $init = ($ini-1) * $limit_end;

                                            $sql .= " LIMIT $init, $limit_end";
                                            $num = $conexion->query($count);

                                            $x = $num->fetch_array();

                                            $total = ceil($x[0]/$limit_end);

                                            //_______________------------------__________________________----------------

                                            $registros=mysqli_query($conexion,$sql);

                                                
                                         ?>
                                    <table class="table  table-inverse table-hover >" >
                                        <thead align="center">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Dni</th>
                                                <th>FecNac</th>
                                                <th>Puesto</th>
                                                <th>Curriculum</th>
                                                <th>Contrato</th>
                                                <th>Detalles</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                            <?php  
                                            //$c = $conexion->query($sql);

                                            while($linea = $registros->fetch_array(MYSQLI_ASSOC)){

                                            //while ($linea=mysqli_fetch_array($registros)) {
                                            ?>
                                                <tr >
                                                    <td><?php echo $linea['nombre']; ?></td>
                                                    <td><?php echo $linea['apellido']; ?></td>
                                                    <td><?php echo $linea['dni']; ?></td>
                                                    <td><?php echo $linea['fecNac']; ?></td>
                                                    <td><?php echo $linea['puesto']; ?></td>
                                                    <td><a href="verCurriculumm.php?dni=<?php echo $linea['dni'] ?>">Ver</a></td>
                                                    <td><a href="verContrato.php?dni=<?php echo $linea['dni']; ?>">Ver</a></td>
                                                    <td>
                                                        <a href="detTrabajador.php?dni=<?php echo $linea['dni'] ?>">
                                                            <div class="icon-holder">
                                                                <i class="fas fa-address-card" style="font-size: 20px"></i>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="trabajadores/editTrabajador.php?dni=<?php echo $linea['dni'] ?>">
                                                             <div class="icon-holder">
                                                                <i class="fas fa-user-edit" style="font-size: 20px"></i>
                                                            </div>
                                                        </a>
                                                    <td>
                                                        <a href="trabajadores/delTrabajadorBD.php?dni=<?php echo $linea['dni'] ?>">
                                                            <div class="icon-holder" style="color:red; font-size: 20px">
                                                                <i class="icon fas fa-user-times"></i>
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php  
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                     <!--numeración de registros [importante] -->
                                        <?php
                                          echo "<div >";
                                          echo "<ul class='pagination'>";
                                          /****************************************/
                                          if(($ini - 1) == 0)
                                          {
                                            echo "<li class='page-item'><a class='page-link' href='#'>&laquo;</a></li>";
                                          }
                                          else
                                          {
                                            echo "<li class='page-item'><a class='page-link' href='$url?pos=".($ini-1)."'><b>&laquo;</b></a></li>";
                                          }

                                          /****************************************/

                                          for($k=1; $k <= $total; $k++)
                                          {
                                            if($ini == $k)
                                            {
                                              echo "<li class='page-item'><a class='page-link' href='#'><b>".$k."</b></a></li>";
                                            }
                                            else
                                            {
                                              echo "<li class='page-item'><a class='page-link' href='$url?pos=$k'>".$k."</a></li>";
                                            }
                                          }

                                          /****************************************/

                                          if($ini == $total)
                                          {
                                            echo "<li class='page-item'><a class='page-link' href='#'>&raquo;</a></li>";
                                          }
                                          else
                                          {
                                            echo "<li class='page-item'><a class='page-link' href='$url?pos=".($ini+1)."'><b>&raquo;</b></a></li>";
                                          }

                                          /*******************END*******************/
                                          echo "</ul>";
                                          echo "</div>"
                                        ?>

                                    </div>
                                </div><!--//section-block-->
                            </section><!--//doc-section-->
                        </div><!--//content-inner-->
                    </div><!--//doc-content-->
                </div><!--//doc-body-->              
            </div><!--//container-->
        </div>
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

