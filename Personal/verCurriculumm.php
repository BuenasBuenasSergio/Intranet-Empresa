<?php
session_start();

include("../conexion.php");

$dni = $_GET['dni'];

if ($_SESSION['nombre'] == null) {
	header("location:..\index.php");
}
?>
<?php

    $sql = "SELECT * FROM trabajadores WHERE dni = '$dni'";
    $registros=mysqli_query($conexion,$sql);
    
    $linea=mysqli_fetch_array($registros);
    
    
       ?>
        <embed src="<?php echo $linea['curriculum']; ?>" type="application/pdf" width="100%" height="100%" />
     <?php

   	
    ?>


