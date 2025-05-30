<?php
$conexion = new mysqli("127.0.0.1", "root", "", "dgsub_sicops");

// Comprobando si hay un error de conexión.
if ($conexion->connect_error) {
    echo 'Error de conexion ' . $conexion->connect_error;
    exit;
}

$sql = "SELECT id,tipo FROM tipos_auditoria";
$result = $conexion->query($sql);

$datos = array();
while ($row = $result->fetch_assoc()) {
    $datos[] = $row;
}

$conexion->close();

header('Content-Type: application/json');
echo json_encode($datos);
