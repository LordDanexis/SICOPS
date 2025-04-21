<?php
require_once("../includes/conexion.php");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $directorioDestino = "uploads/";
    $titulo = $_POST["titulo"];

    // Verificar que la carpeta existe, si no, crearla
    if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0777, true);
    }

    $nombreArchivo = basename($_FILES["archivo"]["name"]);
    $rutaDestino = $directorioDestino . $nombreArchivo;

    // Validar tipo de archivo
    if ($_FILES["archivo"]["type"] == "application/pdf") {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaDestino)) {
            // Insertar en la base de datos
            $sql = "INSERT INTO documentos (titulo, archivo) VALUES ('$titulo', '$rutaDestino')";
            if ($conexion->query($sql) === TRUE) {
                echo "<script>alert('Archivo subido correctamente.'); window.location='index.php';</script>";
            } else {
                echo "<p class='alert alert-danger'>Error al registrar documento.</p>";
            }
        } else {
            echo "<p class='alert alert-danger'>Hubo un error al subir el archivo.</p>";
        }
    } else {
        echo "<p class='alert alert-danger'>Solo se permiten archivos PDF.</p>";
    }
}
