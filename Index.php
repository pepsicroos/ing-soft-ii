<?php
session_start();
	require "Administradores/funciones/conecta.php";
	$con = conecta();
	$sql = "SELECT * FROM banners WHERE status = 1 order by rand() limit 2";
	$res = $con->query($sql);

	$con2 = conecta();
	$sql2 = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0 order by rand() limit 4";
	$res2 = $con2->query($sql2);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina Principal</title>
	<link rel="stylesheet" type="text/css" href="estiloIndex.css">
	<script src="jquery.js"></script>
	<script>

		function carrito(id){
			//var id = $('#id').val();
			var cantidad = $('#cantidad'+id).val();
			alert(id);
			alert(cantidad);
			$.ajax({
	          url      : 'carritoSalva.php',
	          type     : 'post',
	          dataType : 'text',
	          data     : 'id='+id+'&cantidad='+cantidad,
	          success  : function(res){
				  alert(res);
				  if(res == 1){
	              alert("Agregado");
				  }
	            },error : function(){
	              alert('No se agrego el producto');
	            }
	        });
		}
	</script>
</head>
<body>

	<h1><img src="NUBE_MUJER.PNG" align="middle">NUBE MUJER</h1>

	<nav>
      <ul>
        <li><a href="Index.php">Home</a></li>
        <li><a href="Productos.php">Productos</a></li>
        <li><a href="Contacto_formulario.php">Contacto</a></li>
        <li><a href="carrito.php">Carrito</a></li>
      </ul>
    </nav>
	<div class="slider">
	  	<ul>
	  		<?php
				while ($row = $res->fetch_array()) {
					$id = $row['id'];
					$imagen = $row['archivo'];

					echo "<li><img src=\"Administradores/archivosBan/$imagen\"/></li><br>";
				}
			?>
	  	</ul>
	</div>
    <div class="principal">
		<h2>¡MAS VENDIDOS!</h2>
		<?php
			while ($row = $res2->fetch_array()) {
				$id = $row['id'];
				$nombre = $row['nombre'];
				$codigo = $row['codigo'];
				$precio = $row['costo'];
				$imagen = $row['archivo_n'];

				echo "<div class=\"productos\"/>";
					echo "<img src=\"Administradores/archivosProd/$imagen\"/><br>";
					echo "<a href=\"ProductosDetalles.php?id=$id\">".$nombre."</a><br>";
					echo "Codigo: ".$codigo."<br>";
					echo "$".$precio."<br>";
					echo "cantidad:<input id=\"cantidad".$id."\" type=\"number\" value=\"1\" min=\"1\" max=\"5\"/><br>";
					echo "<input type=\"submit\" onclick=\"carrito($id);return false;\"/><br>";
				echo "</div>";
			}
		?>
	</div>

    <footer class="final">
    <nav>
    	<ul>
        <li><a href="">Facebook</a></li>
        <li><a href="">Instagram</a></li>
        <li><a href="">Términos y condiciones</a></li>
        <li><p>Derechos Reservados</p></li>
      </ul>
    </nav>
    </footer>

</body>
</html>