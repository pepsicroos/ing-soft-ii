<?php
require "funciones/conecta.php";
$con = conecta();
//Recibir datos
$nombre = $_POST ['nombre'];
$apellidos = $_POST ['apellidos'];
$correo = $_POST ['correo'];
$pass = $_POST ['password'];
$rol = $_POST ['rol'];
$pass = md5($pass);

$file_name = $_FILES['archivo']['name']; //nombre real archivo
$file_tmp = $_FILES['archivo']['tmp_name']; //nombre temporal archivo
$cadena = explode(".", $file_name); //separar nombre para exension
$ext = $cadena[1]; //extension
$dir = "archivos/"; //carpeta donde se guardan los archivos
$file_enc = md5_file($file_tmp); //nombre archivo encriptado

echo "file_name: $file_name <br>";
echo "file_tmp: $file_tmp <br>";
echo "ext: $ext <br>";
echo "file_enc: $file_enc <br>";

if($file_name != ''){
	$nombreNuevo = "$file_enc.$ext";
	copy($file_tmp, $dir.$nombreNuevo);
}

//Consultar para insertar
$sql = "INSERT INTO administradores
		(nombre, apellidos, correo, pass, rol, archivo_n, archivo)
		VALUES ('$nombre', '$apellidos', '$correo', '$pass', $rol, '$nombreNuevo', '$file_Name')";

//Ejecutar consulta
$res = $con->query($sql);

//Cerrar conexion
header("location:AdministradoresLista.php");
//echo $sql;
?>