<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");
//require_once("../includes/clases.php");
require_once("../includes/funciones.php");
$enlace = mysqli_connect("127.0.0.1","root","","dgsub_sicops");

//----------------------- Estado del Sistema ----------------------------
if($_REQUEST['proceso'] == "estadoSistema") {
	//estado sistema
	$query= "UPDATE configuracion set boleano = ".$_REQUEST['sistemaEdo']." WHERE proceso = '".$_REQUEST['proceso']."' ";
	mysqli_query($enlace, $query); 
	//mensaje
	$query= "UPDATE configuracion set boleano = ".$_REQUEST['sistemaEdo'].",opciones = '".$_REQUEST['mensajeTxt']."' WHERE proceso = 'mensajeCierre' ";
	mysqli_query($enlace, $query); 

	if($query) echo "Datos guardados...";
}
//----------------------------------------Asistencia----------------------------
?>

