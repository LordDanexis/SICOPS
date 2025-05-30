<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subida de Archivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Subir Archivos</h2>
        <form id="uploadForm" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">Selecciona un archivo</label>
                <input class="form-control" type="file" id="formFile" name="archivo">
            </div>
            <button type="submit" class="btn btn-primary">Subir</button>
        </form>
        <div id="fileLink" class="mt-3"></div>
    </div>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('fileLink').innerHTML = data;
                })
                .catch(error => {
                    document.getElementById('fileLink').innerHTML = 'Error al subir el archivo.';
                    console.error('Error:', error);
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dir_subida = 'uploads/';
    if (!is_dir($dir_subida)) {
        mkdir($dir_subida, 0777, true);
    }

    $fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);
    $tipo_archivo = pathinfo($fichero_subido, PATHINFO_EXTENSION);
    $tipos_permitidos = ['jpg', 'jpeg', 'png', 'pdf'];

    if (!in_array($tipo_archivo, $tipos_permitidos)) {
        echo "Tipo de archivo no permitido.";
        exit;
    }

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