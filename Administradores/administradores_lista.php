<?php
//administradores_lista.php
require "funciones/conecta.php";
$con = conecta();

$sql = "SELECT *FROM administradores
	WHERE status = 1 AND eliminado = 0";
$res = $con->query($sql);

while($row = $res->fetch_array()){
	$id = $row ["id"];
	$nombre = $row ["nombre"];
	$apellidos = $row ["apellidos"];
	$rol = ($rol == 1) ? 'Administrador' : 'Usuario';
	echo "$id $nombre $apellidos &nbsp;&nbsp;&nbsp;";
	echo "<a href=\"elimina_administradores.php?id=$id\">Eliminar</a>";
	echo "<br>";
}

?>