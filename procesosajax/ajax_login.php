<?php
//------------------------------------------------------------------------------
session_start();
//------------------------------------------------------------------------------
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");
//------------------------------------------------------------------------------
//include("../includes/clases.php");
include("../includes/funciones.php");
$enlace = mysqli_connect("127.0.0.1","root","","dgsub_sicops");
//$conexion = new conexion;
//$conexion->conectar();
//-------------------------- DESINFECTAR VARIABLES -----------------------------
//------------------------------------------------------------------------------
$user = ivalorSeguro($enlace, $_POST['user']);
$pass = ivalorSeguro($enlace, $_POST['pass']);
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
$contador = 0;
$sql = "SELECT * FROM usuarios WHERE usuario = '".$user."' AND password = '".$pass."' AND status = 1";
$r = mysqli_query($enlace, $sql); //pasas la query a la conexion
$d = mysqli_fetch_array($r,MYSQLI_BOTH);
if (!mysqli_query($enlace, "SET @a:='esto no funcionará'")) {
	printf("Error: %s\n", mysqli_error($enlace));
}

//$fila =  mysqli_fetch_array($result);
$row_cnt = mysqli_num_rows($r);


// printf($_SESSION['acceso']);
// printf($_SESSION['SICOPS-BETA']);

//$consulta = mysqli_fetch_assoc($sql);
//$contador = mysqli_num_rows($sql);
//printf("esto me trae la variable sql %d.\n",$r);
//------------------------------------------------------------------------------
if($row_cnt != 0)
{
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
// 	printf($_SESSION['acceso']);
// printf($_SESSION['SICOPS-BETA']);
// printf($_SESSION['id']);
// printf($_SESSION['usuario']);
// printf($_SESSION['nombre']);
// printf($_SESSION['no_empleado']);
// printf($_SESSION['direccion']);
// printf($_SESSION['nivel']);
// printf($_SESSION['oficios']);
// printf($_SESSION['a']);
}
?>
