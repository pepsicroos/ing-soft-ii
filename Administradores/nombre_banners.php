<?php
 	require "funciones/conecta.php";
 	$con=conecta();
 
	$nombre = $_POST['nombre'];
	$archivo = $_POST['archivo'];

	$sql = "SELECT * FROM productos 
			WHERE nombre = '$nombre' AND archivo = '$archivo'"; 
	$res = $con->query($sql);
	//$fila = mysqli_num_rows($res);
	$fila = $res->num_rows;
	echo $fila;

?>