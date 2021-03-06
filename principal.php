<?php 
session_start();

//si no esta ioniciada la sesion se cambia manda al index
if ($_SESSION['nombre'] == null) {
    header("location:index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pagina Principal</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="assets/plugins/elegant_font/css/style.css">    
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    
    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-24707561-28', 'auto');
      ga('send', 'pageview');
    
    </script>
    
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','//connect.facebook.net/en_US/fbevents.js');
    
    fbq('init', '1506230579705064');
    fbq('track', "PageView");</script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1506230579705064&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

</head> 

<body class="landing-page">   
	
	<!-- GITHUB BUTTON JS -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
     
    <!--FACEBOOK LIKE BUTTON JAVASCRIPT SDK-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
        <!-- ******Header****** -->
        <header class="header text-center">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">
                        <span aria-hidden="true" class="icon_documents_alt icon"></span>
                        <span class="text-highlight">Movi</span><span class="text-bold">Control</span>
                    </h1>
                </div><!--//branding-->
                </div><!--//tagline-->                
            </div><!--//container-->
            <?php echo $_SESSION['nombre'] ;
                  echo $_SESSION['dni'] ;?>
        </header><!--//header-->
        <section class="cards-section text-center">
            <div class="container">
                <div id="cards-wrapper" class="cards-wrapper row">
                <?php 

                    include("conexion.php");

                // Creamos la consulta
                    $sql = "SELECT * FROM secciones ";

                    $registros=mysqli_query($conexion,$sql);

                    $total=mysqli_num_rows($registros);

                    while($linea=mysqli_fetch_array($registros)){
                        ?>
                            <div class=" <?php echo $linea['class'] ?> ">
                                <div class="item-inner">
                                    <div class="icon-holder">
                                        <i class="<?php echo $linea['image'] ?>"></i>
                                    </div><!--//icon-holder-->
                                    <h3 class="title"><?php echo $linea['seccion'] ?></h3>
                                     <p class="intro"><?php echo $linea['descripcion'] ?></p>
                                    <a class="link" href="<?php echo $linea['direccion'] ?>"><span></span></a>
                                </div><!--//item-inner-->
                            </div><!--//item-->
                        <?php 
                    };
                    ?>
                </div><!--//cards-->
            </div><!--//container-->
        </section><!--//cards-section-->
    
    
    <footer class="footer text-center">
        <div class="container">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Movicontrol </small>
        </div><!--//container-->
    </footer><!--//footer-->
    
     
    <!-- Main Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>     
    <script type="text/javascript" src="assets/plugins/stickyfill/dist/stickyfill.min.js"></script>                                                                
    <script type="text/javascript" src="assets/js/main.js"></script>
    
</body>
</html> 

