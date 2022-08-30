<?php
 	require "funciones/conecta.php";
 	$con=conecta();
 
	$codigo = $_POST['codigo'];

	$sql = "SELECT * FROM productos 
			WHERE codigo = '$codigo'"; 
	$res = $con->query($sql);
	//$fila = mysqli_num_rows($res);
	$fila = $res->num_rows;
	echo $fila;

?>