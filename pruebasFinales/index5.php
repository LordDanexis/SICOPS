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
        <h2>Formulario de Presuntos</h2>
        <div class="col-6">
            <label for="nopresuntos" class="form-label">No. de Presuntos:</label>
            <input type="number" min="0" max="60" class="form-control" name="nopresuntos" id="nopresuntos">
        </div>
        <div id="modalContainer"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">ALTA DE PRESUNTOS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario dentro del modal -->
                    <form action="../presuntos/insertar_presuntos.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Ingresa el nombre del Presunto:</label>
                            <input class="form-control" type="text" placeholder="Nombre del presunto:" aria-label="default input example">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Escribe tu correo" required>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('nopresuntos').addEventListener('change', function() {
            var numPresuntos = this.value;
            var modalContainer = document.getElementById('modalContainer');
            modalContainer.innerHTML = ''; // Limpiar el contenedor de modales

            for (var i = 0; i < numPresuntos; i++) {
                var modalClone = document.getElementById('formModal').cloneNode(true);
                modalClone.id = 'formModal' + i;
                modalContainer.appendChild(modalClone);
                var modal = new bootstrap.Modal(modalClone);
                modal.show();
            }
        });
    </script>
</body>

</html>