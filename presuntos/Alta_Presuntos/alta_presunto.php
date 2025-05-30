<?php
//****************************** CONEXIÓN A LAS BASES DE DATOS **********************************************
// require_once('../includes/conexion.php');

$sql = "SELECT estado FROM estados ORDER BY id";
$resultado = $conexion->query($sql);
//****************************** CONEXIÓN A LAS BASES DE DATOS **********************************************
?>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">ALTA DE PRESUNTOS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario dentro del modal -->
                <form action="../presuntos/insertar_presuntos.php" method="POST">
                    <div>
                        <div class="row">
                            <label for="clave" class="form-label">Clave de Acción:</label>
                            <div id="modalText"> </div>
                        </div>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="nombre" class="form-label">Nombre del presunto:</label>
                                <input class="form-control" type="text" placeholder="Ingresa el Nombre del presunto..." aria-label="default input example">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input class="form-control" type="text" placeholder="Ingresa el Numero de teléfono del presunto..." aria-label="default input example">
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-3">
                                <label for="monto" class="form-label">Monto inicial (En Pesos $):</label>
                                <div class="input-group col 2">
                                    <span class=" input-group-text">$</span>
                                    <input type="text" id="monto" class="form-control" aria-label="Cantidad en Pesos">
                                </div>
                            </div>

                            <div class="col-3">
                                <label for="calidadpres" class="form-label">Calidad del presunto:</label>
                                <select class="form-select" name="calidadpres" id="calidadpres" onchange="updateCheckboxes(this.value)">
                                    <option value="" selected disabled> Ingresa la calidad del presunto... </option>
                                    <option value="Servidor Público"> Servidor Público </option>
                                    <option value="Particular Persona Física"> Particular Persona Física </option>
                                    <option value="Particular Persona Moral"> Particular Persona Moral </option>
                                    <option value="Particular en Situación Especial"> Particular en Situación Especial </option>
                                </select>
                            </div>

                            <div class="col-3 mb-3">
                                <label for="cargo" class="form-label">Cargo del presunto:</label>
                                <input class="form-control" type="text" id="cargo" placeholder="Ingresa el cargo del presunto..." aria-label="default input example">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="curp" class="form-label">CURP del presunto:</label>
                                <input class="form-control" type="text" id="curp" maxlength="18" min="18" max="18" placeholder="Ingresa la CURP del presunto...">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3 mb-3">
                                <label for="rfc" class="form-label">RFC del presunto:</label>
                                <input class="form-control" type="text" id="rfc" placeholder="Ingresa el RFC del presunto...">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="calle" class="form-label">Calle:</label>
                                <input class="form-control" type="text" id="calle" placeholder="Ingresa la calle...">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="numext" class="form-label">No. exterior:</label>
                                <input class="form-control" type="text" id="numext" placeholder="Ingresa el no. exterior...">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="numint" class="form-label">No. interior:</label>
                                <input class="form-control" type="text" id="numint" placeholder="Ingresa el no. interior...">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3 mb-3">
                                <label for="colonia" class="form-label">Colonia:</label>
                                <input class="form-control" type="text" id="colonia" placeholder="Ingresa la colonia...">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="cp" class="form-label">CP:</label>
                                <input class="form-control" type="text" id="cp" placeholder="Ingresa el código postal...">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="cml" class="form-label">Ciudad/Municipio/Localidad:</label>
                                <input class="form-control" type="text" id="cml" placeholder="Ingresa la ciudad/municipio/localidad...">
                            </div>

                            <div class="col-3">
                                <label for="estado" class="form-label">Estado:</label>
                                <select class="form-select" name="estado" id="estado">
                                    <option value="" selected disabled>Selecciona el estado...</option>
                                    <?php while ($r = $resultado->fetch_assoc()) { ?>
                                        <option value=""><?php echo $r['estado'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <label for="tercero" class="form-label">Tercero(s):</label>
                            <select class="form-select" name="tercero" id="tercero">
                                <option value="" selected disabled> Ingresa el tercero interesado... </option>
                                <option value="Dirección General de Seguimiento A">Dirección General de Seguimiento "A"</option>
                                <option value="Dirección General de Seguimiento B">Dirección General de Seguimiento "B"</option>
                                <option value="Dirección General de Seguimiento C">Dirección General de Seguimiento "C"</option>
                                <option value="Dirección General de Seguimiento D">Dirección General de Seguimiento "D"</option>
                            </select>
                        </div>

                    </div>
                    <hr>

                    <div class="container mt-3">
                        <div id="checkboxesContainer"></div>
                    </div>
            </div>
            <!-----------------------TABLA DE PHP DONDE SE MUESTRAN TODOS LOS DATOS DE LA TABLA DEL PRESUNTO-------------------------------->

            <div class="container mt-5">
                <h1 class="text-center">PRESUNTOS DGSUB</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NO. Exp. DGSUB</th>
                            <th>RFC</th>
                            <th>Domicilio</th>
                            <th>Observaciones</th>
                            <th>Telefono</th>
                            <th>Notificacion</th>

                            <!-- <th>Email</th> -->
                        </tr>
                    </thead>
                    <tbody id="tabla-datos">
                        <!-- Los datos se cargarán aquí -->
                    </tbody>
                </table>
            </div>

            <div class="col-4 mb-3">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>

            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="js/bootstrap.bundle.min.js"></script> -->

<!-- <script>
    function cargarDatos() {
        fetch('../presuntos/Alta_Presuntos/obtener_datos.php')
            .then(response => response.json())
            .then(data => {
                let tablaDatos = document.getElementById('tabla-datos');
                tablaDatos.innerHTML = '';
                data.forEach(row => {
                    let tr = document.createElement('tr');
                    tr.innerHTML = `<td>${row.id}<td>${row.tipo}</td>`;
                    tablaDatos.appendChild(tr);
                });
            });
    }
    setInterval(cargarDatos, 5000); // Actualiza cada 5 segundos
    cargarDatos(); // Carga inicial
</script> -->