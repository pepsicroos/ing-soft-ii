<?php 

    $conexion=mysqli_connect('localhost','root','','administradores');

 ?>
 <link rel="stylesheet" type="text/css" href="estiloDetalles.css">
 <h1><img src="NUBE_MUJER.PNG" align="middle">NUBE MUJER</h1>
 <h3><a href="Index.php">Regresar a pagina principal</a></h3>
 <h3><a href="Productos.php">Regresar a productos</a></h3>
 <div class="principal">
    <?php
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM productos 
                  WHERE id = '$id' AND eliminado = 0";
        $res = $conexion->query($sql);
        $row = $res->fetch_array();

        $nombre = $row ['nombre'];
        $descripcion = $row ['descripcion'];
        $precio = $row ['costo'];
        $imagen = $row ['archivo_n'];
        
        echo "<div class=\"productos\"/>";
        echo "<img src=\"Administradores/archivosProd/$imagen\" align=\"center\"/><br>" ;
        echo "</div>";
    ?>
</div>
<?php
echo "<div class=\"descripcion\" align=\"center\"/>";
echo "Nombre: ".$nombre."<br>";
echo "Decripcion: ".$descripcion."<br>";
echo "$".$precio."<br>";
echo "</div>";
?>