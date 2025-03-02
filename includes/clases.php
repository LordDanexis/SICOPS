<?php
$conn = new mysqli("127.0.0.1", "root", "", "dgsub_sicops");

// Comprobando si hay un error de conexión.
if ($conn->connect_error) {
    echo 'Error de conexion ' . $conn->connect_error;
    exit;
}

?>