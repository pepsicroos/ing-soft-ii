<html>

<head>
	<script src = "jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="estiloContacto.css">

	<script>

	function validaDatos(){

		var nombre = document.Forma01.nombre.value;
		var correo = document.Forma01.correo.value;
		var asunto = document.Forma01.asunto.value;
		var mensaje = document.Forma01.mensaje.value;

		if ( nombre != "" && correo != "" && asunto !="" && mensaje !="") {
			document.Forma01.method = "POST";
			document.Forma01.action = "bienvenida.php";
			document.Forma01.submit();
		}
		else{
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('');", 5000);
		}
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


	<form name="Forma01" action="" method="post" align="center" class="form-register">
      <h1>CONTACTO</h1>
      <input type="text" name="nombre" id="nombre" class="controls" placeholder="Nombre"/><br>
			<input type="text" name="correo" id="correo" class="controls" placeholder="Correo"/><br>
      <input type="text" name="asunto" id="asunto" class="controls" placeholder="Asunto" /><br><br>
      <input type="text" name="mensaje" id="mensaje" class="controls" placeholder="Mensaje" /><br><br>
      <input type="submit" value="Enviar" class="botons" /><br><br>
    </form>

</body>

</html>
