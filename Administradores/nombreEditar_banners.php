<?php
 	require "funciones/conecta.php";
 	$con=conecta();
 
	$nombre = $_POST['nombre'];
	$archivo = $_POST['archivo'];
	$id= $_REQUEST['id_sel'];

	$sql = "SELECT * FROM banners 
			WHERE correo = '$nombre' AND archivo = '$archivo' AND id != $id"; 
	$res = $con->query($sql);
	//echo $fila;
	if(!empty($res) AND mysqli_num_rows($res) == 1){
		echo 1;
	}else{
		echo 0;
	}

?>