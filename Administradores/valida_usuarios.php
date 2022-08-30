<?php
	session_start();
 	require "funciones/conecta.php";
 	$con=conecta();
	
	$correo = $_REQUEST['correo'];
	$pass = $_REQUEST['pass'];
	
	//$status		=$row['status'];

	$sql = "SELECT * FROM administradores 
			WHERE correo = '$correo', pass = '$pass'"; 
	$res = $con->query($sql);
	//$row = $res->fetch_assoc();

	$fila = getNofilas;
	//echo $fila;
	
	if(fila == 1){
		
		
		$_SESSION['idUser'] = $id;
		$_SESSION['nombreUser'] = $nombre;
		$_SESSION['correoUser'] = $correo;
	}

?>