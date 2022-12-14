<?php
//session_start();
	require "Administradores/funciones/conecta.php";

	$con = conecta();
	$sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0";
	$res = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estiloIndex.css">
	<script src="jquery.js"></script>
	<title>Productos</title>
	<script>

		function carrito(id){
			var cantidad = $('#cantidad'+id).val();
			//alert(id);
			//alert(cantidad);
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
	<h3><a href="Index.php">Regresar</a></h3>
	<div class="principal">
		<h2>┬íProductos!</h2>
		<?php
			while ($row = $res->fetch_array()) {
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

</body>

</html>