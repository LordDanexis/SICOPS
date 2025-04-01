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