<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activar Botón</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="mb-3">
            <label for="inputText" class="form-label">Ingresa un dato:</label>
            <input type="text" class="form-control" id="inputText">
        </div>
        <button id="submitButton" class="btn btn-primary" disabled>Enviar</button>
    </div>

    <script>
        document.getElementById('inputText').addEventListener('input', function() {
            const inputText = document.getElementById('inputText').value;
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = inputText.trim() === '';
        });
    </script>
</body>

</html>