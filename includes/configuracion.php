<?php
//require_once("clases.php");

$enlace = mysqli_connect("127.0.0.1","root","","dgsub_sicops");

//$sql = $conexion->select("SELECT * FROM configuracion",false);
$sql = "SELECT * FROM configuracion";

$r = mysqli_query($enlace, $sql); //pasas la query a la conexion



while($d = mysqli_fetch_array($r,MYSQLI_BOTH))
{
	if($d['proceso'] == 'activaPestanas') define('ACTIVAPESTANAS',$d['boleano']);
	if($d['proceso'] == 'estadoSistema')  define('ESTADOSISTEMA',$d['boleano']);
	if($d['proceso'] == 'mensajeCierre')  define('MENSAJECIERRE',$d['opciones']);
}
?>