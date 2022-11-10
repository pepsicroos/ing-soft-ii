<?php 
	session_start();
	session_destroy();
	require "Administradores/funciones/conecta.php";
	$con = conecta();
	$id_pedido = $_SESSION['id_pedido'];

	$sql = "UPDATE pedidos SET status = 1 WHERE id = '$id_pedido'";
	$res = $con->query($sql);

header('Location:pago.php');

?>