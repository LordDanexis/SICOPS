<?php
$conexion = new mysqli("localhost", "root", "", "documentos_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT id, titulo, archivo FROM documentos";
$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila["id"] . "</td>";
    echo "<td>" . $fila["titulo"] . "</td>";
    echo "<td><a href='" . $fila["archivo"] . "' target='_blank' class='btn btn-success'>Ver PDF</a></td>";
    echo "</tr>";
}
