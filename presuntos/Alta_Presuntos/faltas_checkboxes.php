<?php
require_once('../../includes/conexion.php');

$option = $_GET['option'];
$sql = "SELECT falta FROM faltas_admin WHERE calidad_presunto  LIKE '%" . $option . "%'";
$result = $conexion->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row["falta"];
    }
}

echo json_encode($data);
$conexion->close();
