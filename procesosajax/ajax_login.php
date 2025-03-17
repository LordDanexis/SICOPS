<?php
//------------------------------------------------------------------------------
session_start();
//------------------------------------------------------------------------------
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");
//------------------------------------------------------------------------------
include("../includes/funciones.php");
$enlace = mysqli_connect("127.0.0.1", "root", "", "dgsub_sicops");
//-------------------------- DESINFECTAR VARIABLES -----------------------------
//------------------------------------------------------------------------------
$user = ivalorSeguro($enlace, $_POST['user']);
$pass = ivalorSeguro($enlace, $_POST['pass']);
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
$contador = 0;
$sql = "SELECT * FROM usuarios WHERE usuario = '" . $user . "' AND password = '" . $pass . "' AND status = 1";
$r = mysqli_query($enlace, $sql);
$d = mysqli_fetch_array($r, MYSQLI_BOTH);
if (!mysqli_query($enlace, "SET @a:='esto no funcionará'")) {
	printf("Error: %s\n", mysqli_error($enlace));
}
$row_cnt = mysqli_num_rows($r);
//------------------------------------------------------------------------------
if ($row_cnt != 0) {
	$_SESSION['acceso'] = true;
	$_SESSION['SICOPS-BETA'] = true;
	$_SESSION['id'] = $d['id'];
	$_SESSION['usuario'] = $d['usuario'];
	$_SESSION['nombre'] = $d['nombre'];
	$_SESSION['no_empleado'] = $d['no_empleado'];
	$_SESSION['direccion'] = $d['direccion'];
	$_SESSION['nivel'] = $d['nivel'];
	$_SESSION['oficios'] = $d['generar_oficio'];
	$_SESSION['a'] = $d['a'];
	echo "ok";
}
