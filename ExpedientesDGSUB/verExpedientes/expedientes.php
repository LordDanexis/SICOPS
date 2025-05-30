<?php include 'conexion2.php'; ?>
<?php include '../../encabezados/encabezadoModulos.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tabla Avanzada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>


<body>
    <div class="container text-center">
        <div class="row row-cols-2">
            <div class="col-6 mt-3">
                <h2 class="mb-4">EXPEDIENTES DGSUB (Dirección General De Substanciación A)</h2>
            </div>
            <div class="col mt-3"><a href="../../index.php" class="btn btn-dark">Regresar</a></div>
        </div>


        <!-- Filtros -->
        <form id="filterForm" class="row g-3 mb-3">
            <div class="col-md-3"><input type="text" name="cp" class="form-control" placeholder="Cuenta Pública"></div>
            <div class="col-md-3"><input type="text" name="auditoria" class="form-control" placeholder="Auditoría"></div>
            <div class="col-md-3"><input type="text" name="entidad" class="form-control" placeholder="Entidad Fiscalizada"></div>
            <div class="col-md-3"><input type="text" name="exp_dgsub" class="form-control" placeholder="Número de Expediente DGSUB (IPRA)"></div>
            <div class="col-md-3"><input type="text" name="epra" class="form-control" placeholder="EPRA"></div>

            <div class="col-md-2">

            </div>

            <!-- <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div> -->

            <div class="col-auto text-start">
                <label for="mostrar" class="col-form-label">Mostrar: </label>
            </div>

            <div class="col-auto text-start">
                <select name="limit" id="limit" class="form-select">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-auto text-start">
                <label for="registros" class="col-form-label">registros </label>
            </div>
        </form>

        <div class="col-md-2">
            <a href="export.php" class="btn btn-success w-100">Exportar Excel</a>
        </div>

        <!-- Tabla -->
        <div id="tabla-container"></div>
    </div>

    <!-- Modal Ver -->
    <div class="modal fade" id="verModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalles del Registro</h5>
                </div>
                <div class="modal-body" id="verContenido"></div>
                <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button></div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Registro</h5>
                </div>
                <div class="modal-body">
                    <form id="formEditar">
                        <input type="hidden" name="numero_dgsub" id="edit_numero_dgsub">
                        <div class="mb-3"><label>Entidad</label><input type="text" class="form-control" name="entidad" id="edit_entidad"></div>
                        <div class="mb-3"><label>Auditoría</label><input type="text" class="form-control" name="auditoria" id="edit_auditoria"></div>
                        <!-- Agrega más campos si es necesario -->
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function cargarDatos() {
            $.ajax({
                url: 'obtener_datos.php',
                method: 'GET',
                data: $('#filterForm').serialize(),
                success: function(data) {
                    $('#tabla-container').html(data);
                }
            });
        }

        $('#filterForm').on('submit', function(e) {
            e.preventDefault();
            cargarDatos();
        });

        function cambiarPagina(pagina) {
            $("#filterForm input[name=page]").remove();
            $("#filterForm").append(`<input type="hidden" name="page" value="${pagina}">`).submit();
        }

        // function confirmarEliminacion(id) {
        //     if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
        //         alert('Eliminar: ' + id);
        //         // Aquí puedes hacer una petición AJAX para eliminar
        //     }
        // }

        document.addEventListener('DOMContentLoaded', function() {
            const verModal = document.getElementById('verModal');
            verModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const data = JSON.parse(button.getAttribute('data-info'));
                let contenido = '';
                for (const key in data) {
                    contenido += `<p><strong>${key}:</strong> ${data[key]}</p>`;
                }
                document.getElementById('verContenido').innerHTML = contenido;
            });

            const editarModal = document.getElementById('editarModal');
            editarModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const data = JSON.parse(button.getAttribute('data-info'));
                document.getElementById('edit_numero_dgsub').value = data.numero_dgsub || '';
                document.getElementById('edit_entidad').value = data.entidad || '';
                document.getElementById('edit_auditoria').value = data.auditoria || '';
            });

            cargarDatos();
            setInterval(cargarDatos, 2000); // Actualización en tiempo real
        });
    </script>
</body>

</html>