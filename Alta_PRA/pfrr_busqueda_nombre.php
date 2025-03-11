<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");

//require_once("../includes/clases.php");
require_once("../includes/funciones.php");
$enlace = mysqli_connect("127.0.0.1","root","","dgsub_sicops");
$nombre = $_REQUEST["term"];
$cont = 0;

$sql = "SELECT * FROM pfrr_nombres WHERE nombre like '%$nombre%'";
$consulta = mysqli_query($enlace, $sql);

while ($r=mysqli_fetch_array($consulta,MYSQLI_BOTH))
{
	$results[] = array("id"=>$r["id"],"value"=>$r["nombre"], "cargo"=>$r["cargo"], "dependencia"=>$r["dependencia"]);
}

echo json_encode($results);

?>




