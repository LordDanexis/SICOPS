<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");

// require_once("../includes/conexion.php.php");
require_once("../includes/funciones.php");
$enlace = mysqli_connect("127.0.0.1", "root", "", "dgsub_sicops");
$procedimiento = $_REQUEST["term"];
$cont = 0;

$sql = "SELECT id, numero_dgsub, epra FROM pra WHERE epra like '%$procedimiento%'";
$consulta = mysqli_query($enlace, $sql);

while ($r = mysqli_fetch_array($consulta, MYSQLI_BOTH)) {
	$results[] = array("id" => $r["id"], "value" => $r["numero_dgsub"], "epra" => $r["epra"]);
}

echo json_encode($results);
