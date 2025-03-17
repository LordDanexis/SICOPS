<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");
require_once("../includes/conexion.php");
require_once("../includes/funciones.php");

//----------------------- Estado del Sistema ----------------------------
if ($_REQUEST['proceso'] == "estadoSistema") {

	$query = $conexion->query("UPDATE configuracion set boleano = " . $_REQUEST['sistemaEdo'] . " WHERE proceso = '" . $_REQUEST['proceso'] . "' ");
	$query = $conexion->query("UPDATE configuracion set boleano = " . $_REQUEST['sistemaEdo'] . ",opciones = '" . $_REQUEST['mensajeTxt'] . "' WHERE proceso = 'mensajeCierre' ");

	if ($query) echo "Datos guardados...";
}
//----------------------------------------Asistencia----------------------------
