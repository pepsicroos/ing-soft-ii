<?php  
  require "funciones/conecta.php";
  $con = conecta();
  //Recibir datos
  $id = $_POST['id_sel'];
  $nombre = $_POST ['nombre'];
  $codigo = $_POST ['codigo'];
  $descripcion = $_POST ['descripcion'];
  $costo = $_POST ['costo'];
  $stock = $_POST ['stock'];
  $archivo = $_FILES['archivo']['name'];
  $archivo_n = $_FILES['archivo']['tmp_name'];

  if($archivo!=''){
    $archivo_enc=md5_file($archivo_n);
    $cadena = explode(".", $archivo);
    $ext = $cadena[1];
    $dir ="archivosProd/";
    $nombreNuevo = "$archivo_enc.$ext";
    copy($archivo_n, $dir.$nombreNuevo);
    $sql = "UPDATE productos SET nombre='$nombre', codigo='$codigo', descripcion='$descripcion', costo='$costo', stock='$stock', archivo_n='$nombreNuevo',archivo='$archivo' WHERE id=$id";
  }else{
    $sql = "UPDATE productos SET nombre='$nombre', codigo='$codigo', descripcion='$descripcion', costo='$costo', stock='$stock' WHERE id=$id";

  }

  //Ejecutar consulta
  $res = $con->query($sql);
  echo $res;

  //Cerrar conexion
  header("location:ProductosLista.php");
  //echo $sql;


?>