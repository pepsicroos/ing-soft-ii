<?php
//administradores_elimina.php
require "Administradores/funciones/conecta.php";
$con = conecta();

//Recibe Variables
$id = $_REQUEST['id'];

if ($id > 0){
	$sql = "DELETE FROM pedidos_productos
		WHERE id = $id";
	$res = $con->query($sql);
	echo $sql;
}

//header("Location: administradores_lista.php");
?>