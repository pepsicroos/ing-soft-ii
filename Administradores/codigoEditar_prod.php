<?php
 	require "funciones/conecta.php";
 	$con=conecta();
 
	$codigo = $_POST['codigo'];
	$id= $_REQUEST['id_sel'];

	$sql = "SELECT * FROM productos 
			WHERE correo = '$codigo' AND id != $id"; 
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