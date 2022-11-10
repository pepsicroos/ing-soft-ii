<?php 
 require "Administradores/funciones/conecta.php";
 $con = conecta();
?>

<html>

<head>
	<script src = "jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="FormularioEstilo.css">

	<script>

	function validaDatos(){

		var nombre = document.Forma01.nombre.value;
		var correo = document.Forma01.correo.value;
		var tarjeta = document.Forma01.tarjeta.value;
		var pago = document.Forma01.pago.value;
		var paqueteria = document.Forma01.paqueteria.value;

		if ( nombre != "" && correo != "" && tarjeta !="" && pago !="" && paqueteria != 0) {
			document.Forma01.method = "POST";
			document.Forma01.action = "salvaPago.php";
			document.Forma01.submit();
		}
		else{
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('');", 5000);
		}
	}

	function valorPaq(){
		var paqueteria = $('#paqueteria').val();
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


	<form name="Forma01" action="salvaPago.php" method="post" align="center" class="form-register">
      <h1>CONTACTO</h1>
      <input type="text" name="nombre" id="nombre" class="controls" placeholder="Nombre Completo"/><br>
	  <input type="text" name="correo" id="correo" class="controls" placeholder="Correo"/><br>
      <input type="text" name="tarjeta" id="tarjeta" class="controls" placeholder="Numero de Tarjeta" /><br><br>
      <input type="text" name="pago" id="pago" class="controls" placeholder="pago" /><br><br>
      <select name="paqueteria" id="paqueteria" onChange="valorPaq();">
                <option value="0">Selecciona</option>
                <option value="1">DHL</option>
                <option value="2">Paquetexpress</option>
                <option value="3">FedEx</option>
                <option value="4">Estafeta</option>
            </select><br><br>
      <input type="submit" value="Enviar" class="botons" onclick="validaDatos(); return false;"/><br><br>
    </form>

</body>

</html>
