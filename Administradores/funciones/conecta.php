<?php
//./funciones/conecta.php

define("HOST", 'localhost');
define("BD", 'administradores');
define("USER_BD", 'root');
define("PASS_BD", '');

function conecta(){
	$con = new mysqli(HOST, USER_BD, PASS_BD, BD);
	return $con;
}

?>