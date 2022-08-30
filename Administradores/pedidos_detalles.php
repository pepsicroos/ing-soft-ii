<?php
session_start();
if($_SESSION['nombre'] == ''){
    header("Location: index.php");
}
?>
<?php 

    $conexion=mysqli_connect('localhost','root','','administradores');

 ?>
<link rel="stylesheet" type="text/css" href="estiloDetalle.css">
<h1><a href="PedidosLista.php">Regresar</a></h1> <br>
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

<div id="main-container">
<table class="administradores" border="1" align="center" valig="middle" id="Admi">
    <thead>
        <tr align="center" id="encabezado">
            <td>id</td>
            <td>nombre</td>
            <td>cantidad</td>
            <td>precio</td>
            <td>subtotal</td>
        </tr>
    </thead>
    <?php
        $id = $_REQUEST['id'];
        $total = 0;
        $sql = "SELECT *
                FROM pedidos_productos
                WHERE id_pedido = $id";
        $resultado=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($resultado)){
         ?>
         <?php 

         $id_producto = $mostrar['id_producto'];
         $cantidad = $mostrar ['cantidad'];

         $sql2 = "SELECT * FROM productos 
                  WHERE id = $id_producto AND eliminado = 0";
         $resultado2=mysqli_query($conexion,$sql2);

         while($mostrar2=mysqli_fetch_array($resultado2)){
            $precio = $mostrar2 ['costo'];
            $nombre = $mostrar2 ['nombre'];
         }
         $subtotal = $cantidad*$precio;
         $total = $total+$subtotal;
         ?>
        <tr>
            <td><?php echo $id_producto ?></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $cantidad ?></td>
            <td><?php echo $precio ?></td>
            <td><?php echo $subtotal ?></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="4" align="middle">Total</td>
            <td><?php echo $total ?></td>
        </tr>
    </table>
</div>