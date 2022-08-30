<?php
session_start();
if($_SESSION['nombre'] == ''){
	header("Location: index.php");
}
?>
<html>

<head>
	<script src = "jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="estiloAlta.css">
	<h2 align="center">MENU</h2>
	<nav>
      <ul>
        <li><a href="AdministradoresLista.php">Administradores</a></li>
        <li><a href="ProductosLista.php">Productos</a></li>
        <li><a href="BannersLista.php">Baners</a></li>
        <li><a href="PedidosLista.php">Pedidos</a></li>
      </ul>
    </nav>

	<script>

	function validaDatos(){
		var nombre = document.Forma01.nombre.value;
		var codigo = document.Forma01.codigo.value;
		var descripcion = document.Forma01.descripcion.value;
		var costo = document.Forma01.costo.value;
		var stock = document.Forma01.stock.value;

		if (nombre != "" && codigo != "" && descripcion != "" && costo !="" && stock !="") {
			//alert('Todos los campos han sido llenados');
			document.Forma01.method = "POST";
			document.Forma01.action = "salva_productos.php";
			document.Forma01.submit();
		}
		else{
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('');", 5000);
		}
	}
	
	function validaCodigo(){
		var codigo = $('#codigo').val();
		$.ajax({
          url      : 'codigo_productos.php',
          type     : 'post',
          dataType : 'text',
          data     : 'codigo='+codigo,
          success  : function(res){
			  //alert(res);
			  if(res == 1){
              $('#mensaje1').html('El codigo '+codigo+' ya existe');
              $('#codigo').val("");
              setTimeout("$('#mensaje1').html('');", 5000);
			  }
            },error : function(){
              alert('Error archivo no encontrado');
            }
        });
	}
	
	function limpiaCampo(){
		$('#mensaje1').html('');
	}
	
	function valorRol(){
		var rol = $('#rol').val();
		//alert(rol);
	}
	
	</script>

	<style>
	.error{
		display:inline;
		color:#FF0000;
	}
	</style>

</head>

<body>

	<h2><a href="ProductosLista.php">Regresar</a></h2> <br>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>

	<form enctype="multipart/form-data" name="Forma01" action="salva_productos.php" method="post" align="center" id="registro"class="form-register">
		<h1>Alta</h1>
      <input type="text" name="nombre" id="nombre" class="controls" placeholder="Escribe el nombre" /> <br>
			<input type="text" name="codigo" id="codigo" class="controls" placeholder="Escribe el codigo" onFocus="limpiaCampo();" onBlur="validaCodigo();" /> <br>
			<div id="mensaje1" class="error"></div><br>
			<input type="text" name="descripcion" id="descripcion" class="controls" placeholder="Escribe tu descripcion" /> <br>
      <input type="text" name="costo" id="costo" class="controls" placeholder="Escribe el costo" /><br>
      <input type="text" name="stock" id="stock" class="controls" placeholder="Escribe el stock" /><br>
      <input type="file" id="archivo" name="archivo"><br><br>
      <input type="submit" value="salvar" class="botons" onclick="validaDatos(); return false;" /><br>
      <div id="mensaje2" class="error"></div><br>
			<input type="hidden" id="id_sel" name="id_sel" value="0" />
    </form>

</body>

</html>