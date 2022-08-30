<?php
session_start();
if(isset($_SESSION['nombre'])){
	header("Location: bienvenida.php");
}
?>
<html>

<head>
	<script src = "jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="estiloIndex.css">

	<script>

	function validaDatos(){

		var correo = document.Forma01.correo.value;
		var password = document.Forma01.pass.value;

		if ( correo != "" && password !="") {
      $('#mensaje2').html('Campos llenos');
      setTimeout("$('#mensaje2').html('');", 5000);
			document.Forma01.method = "POST";
			document.Forma01.action = "bienvenida.php";
			document.Forma01.submit();
		}
		else{
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('');", 5000);
		}
	}

	function validaMail(){
		var correo = document.Forma01.correo.value;
		var password = document.Forma01.pass.value;

		if ( correo != "" && password !="") {
		}
		else{
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('');", 5000);
		}

		var correo = $('#correo').val();
		var pass   = $('#pass').val();
		$.ajax({
          url      : 'correoInicio.php',
          type     : 'post',
          dataType : 'text',
          data     : 'correo='+correo+'&pass='+pass,
          success  : function(res){
          	//alert(res);
			  if(res == 1 ){
          $('#mensaje1').html('El usuario si existe');
          setTimeout("$('#mensaje1').html('');", 5000);
					document.Forma01.method = "POST";
					document.Forma01.action = "bienvenida.php";
					document.Forma01.submit();

			  }else{
          $('#mensaje1').html('El usuario no existe');
          setTimeout("$('#mensaje1').html('');", 5000);

        }
            },error : function(){
              alert('Usuario no existe');
            }
        });
	}

	function limpiaCampo(){
		$('#mensaje1').html('');
	}

	function valorRol(){
		var rol = $('#rol').val();
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


	<form name="Forma01" action="bievenida.php" method="post" align="center" class="form-register">
      <h1>Login</h1>
			<input type="text" name="correo" id="correo" class="controls" placeholder="Escribe tu correo" onFocus="limpiaCampo();"/><br>
			<div id="mensaje1" class="error"></div><br>
      <input type="password" name="pass" id="pass" class="controls" placeholder="Escribe tu contrasena" /><br><br>
      <input type="submit" value="Login" class="botons" onclick="validaMail();return false;" /><br><br>
      <div id="mensaje2" class="error" align="right"></div><br><br>
			<input type="hidden" id="id_sel" name="id_sel" value="0" />
    </form>

</body>

</html>
