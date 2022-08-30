<?php
 	require "./funciones/conecta.php";
 	$con=conecta();

  $correo = $_POST['correo'];
  $pass   = $_POST['pass'];
  //$status = $_POST['status'];
  

	$sql = "SELECT * FROM administradores
			WHERE correo='$correo' AND pass = '$pass'";
	$res = $con->query($sql);
	$fila = $res->num_rows;
	echo $fila;

?>
