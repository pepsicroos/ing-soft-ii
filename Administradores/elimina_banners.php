<?php
//administradores_elimina.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe Variables
$id = $_REQUEST['id'];

if ($id > 0){
	//$sql = "DELETE FROM administradores
	//	WHERE id = $id";
	$sql = "UPDATE banners
		SET eliminado = 1
		WHERE id = $id";
	//$res = mysql_query($sql, $con);
	$res = $con->query($sql);
}
echo $sql;
//header("Location: administradores_lista.php");
?>