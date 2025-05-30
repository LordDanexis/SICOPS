<?php
require_once('../includes/conexion.php');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$term = $_GET['term'];
$sql = "SELECT accion, cp, auditoria, epra, entidad FROM acciones_sicsa WHERE accion LIKE '%" . $term . "%'";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'label' => $row['accion'],
        'cp' => $row['cp'],
        'auditoria' => $row['auditoria'],
        'epra' => $row['epra'],
        'entidad' => $row['entidad']
    );
}

echo json_encode($data);
$conn->close();
?>
