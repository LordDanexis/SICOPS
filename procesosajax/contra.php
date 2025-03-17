<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ERROR | E_PARSE);
//require_once("../includes/clases.php");
require_once("../includes/funciones.php");

$enlace = mysqli_connect("127.0.0.1", "root", "", "dgsub_sicops");
$nivel = ivalorSeguro($enlace, $_REQUEST['nivel']);

foreach ($_POST as $nombre_campo => $valor) {
	$asignacion = "\$" . $nombre_campo . " = '" .  ivalorSeguro($enlace, $valor) . "';";
	eval($asignacion);
}

$sql = "SELECT * FROM usuarios where usuario='$userForm' ";
$query = mysqli_query($enlace, $sql);
$r = mysqli_fetch_array($query, MYSQLI_ASSOC);


$user = $r['usuario'];
$contrase = $r['password'];
$cont = $r['veces'];
if ($contrase != $old_contra) {
	echo " <br> <center><h2> Contraseña Anterior Incorrecta.</center></h2>";
	echo " <br> <center><h2> Verifica tu contraseña o Contacta al Administrador del Sistema</center></h2>";
} else {
	$cont = $cont + 1;

	$sql = "UPDATE usuarios set password = '$new_contra', veces='$cont' WHERE usuario ='$userForm' ";
	mysqli_query($enlace, $sql);

	echo "<center><h2> Cambio de Contraseña Correcto </center></h2>";

	session_start();
	$_SESSION['acceso'] == false;

	session_destroy();
}
@mysqli_free_result($query);
