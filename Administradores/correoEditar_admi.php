<?php
 	require "funciones/conecta.php";
 	$con=conecta();
 
	$correo = $_POST['correo'];
	$id= $_REQUEST['id_sel'];

	$sql = "SELECT * FROM administradores 
			WHERE correo = '$correo' AND id != $id"; 
	$res = $con->query($sql);
	//$fila = mysqli_num_rows($res);
	//$fila = $res->num_rows;
	//echo $fila;
	if(!empty($res) AND mysqli_num_rows($res) == 1){
		echo 1;
	}else{
		echo 0;
	}

?>