<?php
session_start();
require "Administradores/funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$cantidad = $_REQUEST['cantidad'];
$total = 0;

if (isset($_SESSION['id_pedido'])) {
    	$id_pedido = $_SESSION['id_pedido'];
    }else{
    	$fecha = date('d/m/Y');
    	$sql = "INSERT INTO pedidos (fecha) VALUES ('$fecha')";
    	$res = $con->query($sql);
    	$sql = "SELECT id FROM pedidos WHERE status=0";
		$res = $con->query($sql);
		$row = $res->fetch_array();
		$id_pedido = $row['id'];
		$_SESSION['id_pedido'] = $id_pedido;
}

$sql = "SELECT * FROM productos
		WHERE id = '$id' AND eliminado = 0";

$res = $con->query($sql);
$row = $res->fetch_array();

    $id = $row['id'];
    $nombre = $row['nombre'];
    $precio = $row['costo'];


$sql3 = "INSERT INTO pedidos_productos 
	(id_pedido, id_producto, cantidad, precio)
	VALUES ('$id_pedido', '$id', '$cantidad', '$precio')";
$res = $con->query($sql3);

$subtotal = $cantidad*$precio;
$total = $total+$subtotal;
//echo $imagen;

?>



<?php //echo $id_pedido; 
    //echo $sql3;
?>
