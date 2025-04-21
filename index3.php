<?php
// Variables dinámicas en PHP
$variable1 = "Hola desde PHP 1";
$variable2 = "Hola desde PHP 2";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/bootstrap_5.3.3/css/bootstrap.min.css">
    <title>Modal con PHP</title>
</head>

<body>
    <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-variable="<?php echo $variable1; ?>">
            Botón 1
        </button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-variable="<?php echo $variable2; ?>">
            Botón 2
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal con Variable PHP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Aquí se mostrará la variable -->
                        <p id="modal-variable"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="css/bootstrap_5.3.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // Capturar el evento al abrir el modal
        const exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Botón que activó el modal
            const button = event.relatedTarget;

            // Obtener la variable desde el atributo data-bs-variable
            const variable = button.getAttribute('data-bs-variable');

            // Mostrar la variable en el contenido del modal
            const modalVariable = document.getElementById('modal-variable');
            modalVariable.textContent = variable;
        });
    </script>
</body>

</html>