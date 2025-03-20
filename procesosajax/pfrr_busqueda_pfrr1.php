<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");

//require_once("../includes/clases.php");
require_once("../includes/funciones.php");
$enlace = mysqli_connect("127.0.0.1","root","","dgsub_sicops");
$procedimiento = $_REQUEST["term"];
$cont = 0;

$sql= "SELECT * FROM pra WHERE pra like '%$procedimiento%'";
$consulta = mysqli_query($enlace, $sql);

while ($r=mysqli_fetch_array($consulta,MYSQLI_BOTH))
{
	$results[] = array("id"=>$r["id"],"value"=>$r["pra"], "num_accion_epra"=>$r["num_accion_epra"], "num_DT"=>$r["num_DT"], "entidad"=>$r["entidad"], "cp"=>$r["cp"], "auditoria"=>$r["auditoria"], "direccion"=>$r["direccion"], "subdirector"=>$r["subdirector"], "abogado"=>$r["abogado"]);
}

echo json_encode($results);

?>




