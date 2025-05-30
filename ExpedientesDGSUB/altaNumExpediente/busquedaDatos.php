<?php
require_once('../../includes/conexion.php');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$term = $_GET['term'];
$sql = "SELECT accion, cp, auditoria, epra, entidad FROM acciones_sicsa WHERE accion LIKE '%" . $term . "%'";
$result = $conexion->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'label' => $row['accion'],
        'campo2' => $row['cp'],
        'campo3' => $row['auditoria'],
        'campo4' => $row['epra'],
        'campo5' => $row['entidad']
    );
}

echo json_encode($data);
$conexion->close();
