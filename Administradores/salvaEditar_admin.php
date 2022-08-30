<?php
require "funciones/conecta.php";
$con = conecta();
//Recibir datos
$id = $_POST['id_sel'];
$nombre = $_POST ['nombre'];
$apellidos = $_POST ['apellidos'];
$correo = $_POST ['correo'];
$pass = $_POST ['password'];
$rol = $_POST ['rol'];

$archivo = $_FILES['archivo']['name'];
$archivo_n = $_FILES['archivo']['tmp_name'];

if(($archivo!='' && !empty($_REQUEST['password']))){

    $passEnc = md5($pass);
    $archivo_enc=md5_file($archivo_n);
    $cadena = explode(".", $archivo);
   	$ext = $cadena[1];
   	$dir ="archivos/";
    $nombreNuevo = "$archivo_enc.$ext";
    copy($archivo_n, $dir.$nombreNuevo);
   $sql = "UPDATE administradores SET nombre='$nombre', apellidos='$apellidos', correo='$correo', pass=$passEnc, rol=$rol, archivo_n='$nombreNuevo',archivo='$archivo' WHERE id=$id";
 } else if(!empty($_REQUEST['password'])){
   $passEnc = md5($pass);
   $sql = "UPDATE administradores SET nombre='$nombre', apellidos='$apellidos', correo='$correo', pass=$passEnc, rol=$rol WHERE id=$id";
 }else if($archivo!=''){
   $archivo_enc=md5_file($archivo_n);
   	$cadena = explode(".", $archivo);
   	$ext = $cadena[1];
   	$dir ="archivos/";
   $nombreNuevo = "$archivo_enc.$ext";
   copy($archivo_n, $dir.$nombreNuevo);
  $sql = "UPDATE administradores SET nombre='$nombre', apellidos='$apellidos', correo='$correo', rol=$rol, archivo_n='$nombreNuevo',archivo='$archivo' WHERE id=$id";
}else{
  $sql = "UPDATE administradores SET nombre='$nombre', apellidos='$apellidos', correo='$correo', rol=$rol WHERE id=$id";

}

//Ejecutar consulta
$res = $con->query($sql);
echo $res;

//Cerrar conexion
header("location:AdministradoresLista.php");
//echo $sql;
?>