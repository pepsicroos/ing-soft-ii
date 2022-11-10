<?php 
require "Administradores/funciones/conecta.php";
$con = conecta();

//Recibir datos
$nombre = $_POST ['nombre'];
$correo = $_POST ['correo'];
$tarjeta = $_POST['tarjeta'];
$pago = $_POST['pago'];
$paqueteria = $_POST['paqueteria'];

$sql = "INSERT INTO paquetes
		(nombre, correo, tarjeta, pago, paqueteria)
		VALUES ('$nombre', '$correo', '$tarjeta', '$pago', $paqueteria)";
$consulta = $con->query($sql);

header('Location:Index.php');

?>