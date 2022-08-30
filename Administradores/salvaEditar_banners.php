<?php  
  require "funciones/conecta.php";
  $con = conecta();
  //Recibir datos
  $id = $_POST['id_sel'];
  $nombre = $_POST ['nombre'];
  $archivo = $_FILES['archivo']['name'];
  $archivo_n = $_FILES['archivo']['tmp_name'];

  if($archivo!=''){
    $archivo_enc=md5_file($archivo_n);
    $cadena = explode(".", $archivo);
    $ext = $cadena[1];
    $dir ="archivosBan/";
    $nombreNuevo = "$archivo_enc.$ext";
    copy($archivo_n, $dir.$nombreNuevo);
    $sql = "UPDATE banners SET nombre='$nombre', archivo='$nombreNuevo' WHERE id=$id";
  }else{
    $sql = "UPDATE banners SET nombre='$nombre', WHERE id=$id";

  }

  //Ejecutar consulta
  $res = $con->query($sql);
  echo $res;

  //Cerrar conexion
  header("location:BannersLista.php");
  //echo $sql;


?>