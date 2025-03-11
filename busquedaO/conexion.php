<?php

// Creando una nueva conexión a la base de datos.
$conexion = new mysqli("127.0.0.1", "root", "", "dgsub_sicops");

// Comprobando si hay un error de conexión.
if ($conexion->connect_error) {
    echo 'Error de conexion ' . $conexion->connect_error;
    exit;
}
