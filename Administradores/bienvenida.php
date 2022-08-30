<?php
session_start();
if($_SESSION['nombre'] == ''){
	header("Location: index.php");
}
?>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
	<title>Bienvenido</title>
	<link rel="stylesheet" type="text/css" href="estiloBienvenida.css">
</head>

<body>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
	<h1 align="center">Bienvenido <?php echo $_SESSION['nombre']; ?></h1> <br>

	<h2 align="center">MENU</h2>
	<nav>
      <ul>
        <li><a href="AdministradoresLista.php">Administradores</a></li>
        <li><a href="ProductosLista.php">Productos</a></li>
        <li><a href="BannersLista.php">Baners</a></li>
        <li><a href="PedidosLista.php">Pedidos</a></li>
      </ul>
    </nav>
</body>

</html>
