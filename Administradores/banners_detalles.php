<?php
session_start();
if($_SESSION['nombre'] == ''){
    header("Location: index.php");
}
?>
<link rel="stylesheet" type="text/css" href="estiloDetalle.css">
<h1><a href="BannersLista.php">Regresar</a></h1> <br>
<h2 align="center">MENU</h2>
    <nav>
      <ul>
        <li><a href="AdministradoresLista.php">Administradores</a></li>
        <li><a href="ProductosLista.php">Productos</a></li>
        <li><a href="BannersLista.php">Baners</a></li>
        <li><a href="PedidosLista.php">Pedidos</a></li>
      </ul>
    </nav>
<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
<?php
//admimistradores_detalle.php
require "./funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$sql = "SELECT *
		FROM banners
		WHERE id = $id";

$res = $con->query($sql);
$row = $res->fetch_assoc();

$nombre = $row ['nombre'];
$imagen = $row['archivo'];
//echo $imagen;

?>
<div id="main-container">
<table class="administradores" border="1" align="center" valig="middle" id="Admi">
    <thead>
        <tr align="center" id="encabezado">
            <td>id</td>
            <td>nombre</td>
            <td>Imagen</td>
        </tr>
    </thead>
        <tr id="fila<?php echo $mostrar['id']?>">
            <td><?php echo $id ?></td>
            <td><?php echo $nombre ?></td>
            <td><img src="archivosBan/<?php echo $imagen; ?>" width="120" height="40"/></td>
        </tr>
    </table>
</div>