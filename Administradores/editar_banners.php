<?php
session_start();
if($_SESSION['nombre'] == ''){
	header("Location: index.php");
}
?>
<?php
//admimistradores_detalle.php
require "./funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];

$sql = "SELECT *
		FROM banners
		WHERE id = $id";

$res = $con->query($sql);
$row = $res->fetch_assoc();

$nombre = $row ['nombre'];
//$imagen = $row['archivo_n'];

?>

<html>

<head>
	<title>Edicion Productos</title>
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

		if (nombre != "") {
			//alert('Todos los campos han sido llenados');
			document.Forma01.method = "POST";
			document.Forma01.action = "salvaEditar_banners.php";
			document.Forma01.submit();
		}
		else{
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('');", 5000);
		}
	}
	
	function validaMail(){
		var nombre = $('#nombre').val();
		var archivo = $('#archivo').val();
		var id = $('#id_sel').val();
		$.ajax({
          url      : 'nombreEditar_banners.php',
          type     : 'post',
          dataType : 'text',
          data     : 'nombre='+nombre+'&archivo='+archivo+'&id_sel='+id,
          success  : function(res){
			  //alert(res);
			  if(res == 1){
              $('#mensaje1').html('El archivo '+nombre+' ya existe');
              $('#nombre').val("");
              $('#archivo').val("");
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
		color:#dc0a00;
	}
	</style>


	</head>

<body>
	<h2><a href="BannersLista.php">Regresar</a></h2> <br>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>


	<form name="Forma01" action="salvaEditar_banners.php" method="post" align="center" id="editar"enctype="multipart/form-data" class="form-register">
		<h1 align="center">Edicion Banners</h1> <br>
      <input type="text" name="nombre" id="nombre" class="controls" placeholder="Escribe el nombre" value="<?php echo $nombre;?>"/> <br>
      <input type="file" id="archivo" name="archivo"><br><br>
      <input type="submit" value="salvar" class="botons" onclick="validaDatos(); return false;" /><br>
      <div id="mensaje2" class="error"></div><br>
			<input type="hidden" id="id_sel" name="id_sel" value="<?php echo $id;?>" />
    </form>

</body>

</html>