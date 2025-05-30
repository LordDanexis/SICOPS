<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Dinámico</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/bootstrap_5.3.3/css/bootstrap.min.css">
</head>

<body class="p-4">

    <div class="container">
        <form id="miFormulario">
            <!-- Campo de entrada principal -->
            <div class="mb-3">
                <label for="campoPrincipal" class="form-label">Campo Principal</label>
                <input type="text" class="form-control" id="campoPrincipal" placeholder="Escribe A.1 o A.2">
            </div>

            <!-- Campo 1: input con valor por defecto -->
            <div class="mb-3">
                <label for="campo1" class="form-label">Campo 1</label>
                <input type="text" class="form-control" id="campo1">
            </div>

            <!-- Campo 2: select con 2 opciones -->
            <div class="mb-3">
                <label for="campo2" class="form-label">Campo 2</label>
                <select class="form-select" id="campo2"></select>
            </div>

            <!-- Campo 3: select con 4 opciones -->
            <div class="mb-3">
                <label for="campo3" class="form-label">Campo 3</label>
                <select class="form-select" id="campo3"></select>
            </div>
        </form>
    </div>

    <script src="autocompletar.js"></script>
</body>

</html>