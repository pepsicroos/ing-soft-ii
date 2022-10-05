<?php
session_start();
if($_SESSION['nombre'] == ''){
	header("Location: index.php");
}
?>
<?php 

	$conexion=mysqli_connect('localhost','root','','administradores');

 ?>

<html>
<head>
	<title>Lista de Administradores</title>
	<h2 align="center">MENU</h2>
	<nav>
      <ul>
        <li><a href="AdministradoresLista.php">Administradores</a></li>
        <li><a href="ProductosLista.php">Productos</a></li>
        <li><a href="BannersLista.php">Pedidos</a></li>
        <li><a href="PedidosLista.php">Pedidos</a></li>
      </ul>
    </nav>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
	<link rel="stylesheet" type="text/css" href="estiloAdmin.css">
	<script src = "jquery.js"></script>

</head>

<body>

<h1 align="center">Banners</h1> <br>

<h2 align="center"><a href="alta_banners.php">Nuevo registro</a></h2> <br>
	<div id="main-container">
	<table class="administradores" border="1" align="center" valig="middle" id="ListaAdmi">
		<thead>
			<tr align="center" id="encabezado">
			<th>id</th>
			<th>fecha</th>
			<th>usuario</th>
			<th>Detalles</th>
		</tr>
		</thead>

		<?php 
		$sql="SELECT * from pedidos where status = 1";
		$resultado=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($resultado)){
		 ?>
		 <?php $id = $mostrar['id'];
		 ?>
		<tr id="fila<?php echo $mostrar['id']?>">
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['fecha'] ?></td>
			<td><?php echo $mostrar['usuario'] ?></td>
			<td><a href="pedidos_detalles.php?id=<?php echo $mostrar['id']?>">Ver detalles</a></td>
			
		</tr>
	<?php
	}
	 ?>
	</table>
	</div>
<div id="mensaje"></div>
</body>
</html>