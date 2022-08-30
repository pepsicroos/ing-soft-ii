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
		var apellidos = document.Forma01.apellidos.value;
		var correo = document.Forma01.correo.value;
		var password = document.Forma01.password.value;
		var rol = document.Forma01.rol.value;

		if (nombre != "" && apellidos != "" && correo != "" && password !="" && rol != 0) {
			//alert('Todos los campos han sido llenados');
			document.Forma01.method = "POST";
			document.Forma01.action = "salva_administradores1.php";
			document.Forma01.submit();
		}
		else{
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('');", 5000);
		}
	}
	
	function validaMail(){
		var correo = $('#correo').val();
		$.ajax({
          url      : 'correo_administradores.php',
          type     : 'post',
          dataType : 'text',
          data     : 'correo='+correo,
          success  : function(res){
			  //alert(res);
			  if(res == 1){
              $('#mensaje1').html('El correo '+correo+' ya existe');
              $('#correo').val("");
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

	<h2><a href="AdministradoresLista.php">Regresar</a></h2> <br>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>

	<form enctype="multipart/form-data" name="Forma01" action="salva_administradores1.php" method="post" align="center" id="registro"class="form-register">
		<h1>Alta</h1>
      <input type="text" name="nombre" id="nombre" class="controls" placeholder="Escribe tu nombre" /> <br>
			<input type="text" name="apellidos" id="apellidos" class="controls" placeholder="Escribe tus apellidos" /> <br>
			<input type="text" name="correo" id="correo" class="controls" placeholder="Escribe tu correo" onFocus="limpiaCampo();" onBlur="validaMail();" /> <br>
			<div id="mensaje1" class="error"></div><br>
            <input type="password" name="password" id="password" class="controls" placeholder="Escribe tu contrasena" /><br>
            <select name="rol" id="rol" onChange="valorRol();">
                <option value="0">Selecciona</option>
                <option value="1">Gerente</option>
                <option value="2">Ejecutivo</option>
            </select><br><br>
            <input type="file" id="archivo" name="archivo"><br><br>
            <input type="submit" value="salvar" class="botons" onclick="validaDatos(); return false;" /><br>
            <div id="mensaje2" class="error"></div><br>
			<input type="hidden" id="id_sel" name="id_sel" value="0" />
    </form>

</body>

</html>