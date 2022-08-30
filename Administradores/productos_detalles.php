<?php
session_start();
if($_SESSION['nombre'] == ''){
    header("Location: index.php");
}
?>
<link rel="stylesheet" type="text/css" href="estiloDetalle.css">
<h1><a href="ProductosLista.php">Regresar</a></h1> <br>
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
		FROM productos
		WHERE id = $id";

$res = $con->query($sql);
$row = $res->fetch_assoc();

$nombre = $row ['nombre'];
$codigo = $row ['codigo'];
$descripcion = $row ['descripcion'];
$costo = $row ['costo'];
$stock = $row ['stock'];
$imagen = $row['archivo_n'];
//echo $imagen;

?>
<div id="main-container">
<table class="administradores" border="1" align="center" valig="middle" id="Admi">
    <thead>
        <tr align="center" id="encabezado">
            <td>id</td>
            <td>nombre</td>
            <td>codigo</td>
            <td>descripcion</td>
            <td>costo</td>    
            <td>stock</td>
            <td>Imagen</td>
        </tr>
    </thead>
        <tr id="fila<?php echo $mostrar['id']?>">
            <td><?php echo $id ?></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $codigo ?></td>
            <td><?php echo $descripcion ?></td>
            <td><?php echo $costo ?></td>
            <td><?php echo $stock ?></td>
            <td><img src="archivosProd/<?php echo $imagen; ?>" width="60" height="60"/></td>
        </tr>
    </table>
</div>