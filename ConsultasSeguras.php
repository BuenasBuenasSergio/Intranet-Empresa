<?php

$db_host = "localhost";
$db_usuario = "root";
$db_password = "root";
$db_nombre = "mydb";

//Configurando la conexion
$db = new mysqli($db_host, $db_usuario, $db_password, $db_nombre);

//Verifiando el estado de la conexion
if(mysqli_connect_errno()) {
    exit("Error al conectar con la BD.");
}

//Seleccionamos el set de caracteres
mysqli_set_charset($db, "utf8");

//preparamos la consulta reemplazando los datos por el signo ?
$pr = $db->prepare("SELECT telefono FROM usuarios WHERE nombre=? AND edad=?");

$nombre = 'jose';
$edad = 18;

//Indicamos los valores pasados por referencia
$pr->bind_param("si", $nombre, $edad);

//Ejecutamos la consulta
if($pr->execute()){
	
	//Alamacenaos los datos de la consulta
	$pr->store_result();
	
	if($pr->num_rows == 0){		
		echo "Sin resultados";
	}
	
	//Indicamos la variable donde se guardaran los resultados
	$pr->bind_result($telefono);
	
	//listamos todos los resultados
	while($pr->fetch()){
		echo "Telefono: $telefono <br>";
	}
	
	//Cerramos la conexion
	$pr->close();
	
} else {
	echo 'Error al realizar la consulta: '.$pr->error;
	$pr->close();
}

?>


<?php
//Insetando nuevos datos

//Configurando la conexion
$db = new mysqli("localhost", "root", "root", "mydb");
if(mysqli_connect_errno())  exit("Error al conectar con la BD.");
mysqli_set_charset($db, "utf8");

//preparamos la consulta INSERT reemplazando los datos por el signo ?
$pr = $db->prepare("INSERT INTO usuarios(nombre, edad, telefono)VALUES(?,?,?)");

//Datos provenientes del usuario
$nombre = 'maria';
$edad = 20;
$telefono = "123456";

//Indicamos el tipo de datos y pasamos los valores por referencia
$pr->bind_param("sis", $nombre, $edad, $telefono);


if($pr->execute()){
	
	//Datos insertados...
	
	echo 'Datos agregados correctamente.';
	
	$pr->close();
	
} else {
	echo 'Error al realizar la consulta: '.$pr->error;
	$pr->close();
}

?>


<?php
//Modificando una fila

//Configurando la conexion
$db = new mysqli("localhost", "root", "root", "mydb");
if(mysqli_connect_errno())  exit("Error al conectar con la BD.");
mysqli_set_charset($db, "utf8");

//preparamos la consulta reemplazando los datos por el signo ?
$pr = $db->prepare("UPDATE usuarios SET telefono=? WHERE nombre=? AND edad=?");

//Valor actualizado
$telefono = "000";

//Valores a coincidir
$nombre = 'jose';
$edad = 18;

//Indicamos el tipo de datos y pasamos los valores por referencia
$pr->bind_param("ssi", $telefono, $nombre, $edad);

//Ejecutamos la consulta
if($pr->execute()){
	
	//Veficiando si alguna fila fue actualizada
	if($pr->affected_rows==0){
		echo "Ninguna fila fue actualizada: ";
	} else
		echo "Datos actualizados correctamente.";
		
	$pr->close();

} else {
	echo 'Error al realizar la consulta: '.$pr->error;
	$pr->close();
}

?>