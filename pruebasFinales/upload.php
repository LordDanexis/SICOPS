<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dir_subida = 'uploads/';

    // Verificar si la carpeta existe, si no, crearla
    if (!is_dir($dir_subida)) {
        mkdir($dir_subida, 0777, true);
    }

    $fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);
    $tipo_archivo = pathinfo($fichero_subido, PATHINFO_EXTENSION);

    // Validar tipo de archivo
    $tipos_permitidos = ['jpg', 'jpeg', 'png', 'pdf'];
    if (!in_array($tipo_archivo, $tipos_permitidos)) {
        echo "Tipo de archivo no permitido.";
        exit;
    }

    // Validar tamaño de archivo (máximo 2MB)
    if ($_FILES['archivo']['size'] > 2000000) {
        echo "El archivo es demasiado grande.";
        exit;
    }

    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
        echo "El archivo se ha subido correctamente.";
        echo "<br><a href='$fichero_subido' class='btn btn-success mt-3' target='_blank'>Ver Archivo</a>";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
