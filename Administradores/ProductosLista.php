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
        <li><a href="BannersLista.php">Baners</a></li>
        <li><a href="PedidosLista.php">Pedidos</a></li>
      </ul>
    </nav>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
	<link rel="stylesheet" type="text/css" href="estiloAdmin.css">
	<script src = "jquery.js"></script>

	<script>
	function eliminaFilas(eliminado){
		if(confirm("¿Desea eliminar el usuario?") == true){
			$.ajax({
			   url       :   'elimina_productos.php',
			   type      :   'post',
			   dataType  :   'text',
	           data      :   'id='+eliminado,
			   success   :   function(res) {
				//alert(res);
				$('#fila'+ eliminado).hide();
				}, error : function(){
					alert('Error, archivo no encontrado');
				}
				
			});
		}
   	}

	</script>
</head>

<body>

<h1 align="center">Productos</h1> <br>

<h2 align="center"><a href="alta_productos.php">Nuevo registro</a></h2> <br>
	<div id="main-container">
	<table class="administradores" border="1" align="center" valig="middle" id="ListaAdmi">
		<thead>
			<tr align="center" id="encabezado">
			<th>id</th>
			<th>nombre</th>
			<th>codigo</th>
			<th>Eliminar</th>
			<th>Detalles</th>
			<th>Editar</th>
		</tr>
		</thead>

		<?php 
		$sql="SELECT * from productos where status = 1 AND eliminado = 0";
		$resultado=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($resultado)){
		 ?>
		 <?php $rol = $mostrar['id'];
		 ?>
		<tr id="fila<?php echo $mostrar['id']?>">
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['codigo'] ?></td>
			<td> <button type="button" name="button" onclick="eliminaFilas(<?php echo $mostrar['id'] ?>);">Eliminar registro</button></td>
			<td><a href="productos_detalles.php?id=<?php echo $mostrar['id']?>">Ver detalles</a></td>
			<td><a href="editar_productos.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
			
		</tr>
	<?php
	}
	 ?>
	</table>
	</div>
<div id="mensaje"></div>
</body>
</html>