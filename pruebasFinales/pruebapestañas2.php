<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios en Pestañas</title>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/bootstrap_5.3.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Formulario 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Formulario 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Formulario 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="tab4-tab" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">Formulario 4</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="tab5-tab" data-bs-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false">Formulario 5</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <form id="form1">
                    <div class="mb-3">
                        <label for="campo1" class="form-label">Campo 1</label>
                        <input type="text" class="form-control" id="campo1" name="campo1">
                    </div>
                    <div class="mb-3">
                        <label for="campo2" class="form-label">Campo 2</label>
                        <input type="text" class="form-control" id="campo2" name="campo2">
                    </div>
                    <div class="mb-3">
                        <label for="campo3" class="form-label">Campo 3</label>
                        <select class="form-select" id="campo3" name="campo3">
                            <option value="">Seleccione una opción</option>
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="campo4" class="form-label">Campo 4</label>
                        <input type="date" class="form-control" id="campo4" name="campo4">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(1)">Siguiente</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <form id="form2">
                    <div class="mb-3">
                        <label for="campo5" class="form-label">Campo 5</label>
                        <input type="text" class="form-control" id="campo5" name="campo5">
                    </div>
                    <div class="mb-3">
                        <label for="campo6" class="form-label">Campo 6</label>
                        <input type="text" class="form-control" id="campo6" name="campo6">
                    </div>
                    <div class="mb-3">
                        <label for="campo7" class="form-label">Campo 7</label>
                        <select class="form-select" id="campo7" name="campo7">
                            <option value="">Seleccione una opción</option>
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="campo8" class="form-label">Campo 8</label>
                        <input type="date" class="form-control" id="campo8" name="campo8">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(2)">Siguiente</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <form id="form3">
                    <div class="mb-3">
                        <label for="campo9" class="form-label">Campo 9</label>
                        <input type="text" class="form-control" id="campo9" name="campo9">
                    </div>
                    <div class="mb-3">
                        <label for="campo10" class="form-label">Campo 10</label>
                        <input type="text" class="form-control" id="campo10" name="campo10">
                    </div>
                    <div class="mb-3">
                        <label for="campo11" class="form-label">Campo 11</label>
                        <select class="form-select" id="campo11" name="campo11">
                            <option value="">Seleccione una opción</option>
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="campo12" class="form-label">Campo 12</label>
                        <input type="date" class="form-control" id="campo12" name="campo12">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(3)">Siguiente</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                <form id="form4">
                    <div class="mb-3">
                        <label for="campo13" class="form-label">Campo 13</label>
                        <input type="text" class="form-control" id="campo13" name="campo13">
                    </div>
                    <div class="mb-3">
                        <label for="campo14" class="form-label">Campo 14</label>
                        <input type="text" class="form-control" id="campo14" name="campo14">
                    </div>
                    <div class="mb-3">
                        <label for="campo15" class="form-label">Campo 15</label>
                        <select class="form-select" id="campo15" name="campo15">
                            <option value="">Seleccione una opción</option>
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="campo16" class="form-label">Campo 16</label>
                        <input type="date" class="form-control" id="campo16" name="campo16">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(4)">Siguiente</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                <form id="form5">
                    <div class="mb-3">
                        <label for="campo17" class="form-label">Campo 17</label>
                        <input type="text" class="form-control" id="campo17" name="campo17">
                    </div>
                    <div class="mb-3">
                        <label for="campo18" class="form-label">Campo 18</label>
                        <input type="text" class="form-control" id="campo18" name="campo18">
                    </div>
                    <div class="mb-3">
                        <label for="campo19" class="form-label">Campo 19</label>
                        <select class="form-select" id="campo19" name="campo19">
                            <option value="">Seleccione una opción</option>
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="campo20" class="form-label">Campo 20</label>
                        <input type="date" class="form-control" id="campo20" name="campo20">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="enviarFormulario()">Enviar</button>
                </form>
            </div>
        </div>
        <div id="resultado" class="mt-3"></div>
    </div>

    <script>
        function nextTab(current) {
            const container = document.querySelector(`#tab${current}`);
            const inputs = container.querySelectorAll('input, select');
            let valid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                    valid = false;
                } else {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                }
            });

            if (!valid) return;

            const next = current + 1;
            const tabs = document.querySelectorAll('.nav-link');
            tabs[next - 1].classList.remove('disabled');
            tabs[next - 1].click();
        }

        function enviarFormulario() {
            const campos = {};
            let valido = true;

            for (let i = 1; i <= 20; i++) {
                const input = document.getElementById(`campo${i}`);
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                    valido = false;
                } else {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                    campos[`campo${i}`] = input.value;
                }
            }

            // Validar selects y fechas adicionales si las hay
            const extras = document.querySelectorAll('select, input[type="date"]');
            extras.forEach(el => {
                if (!el.value.trim()) {
                    el.classList.add('is-invalid');
                    el.classList.remove('is-valid');
                    valido = false;
                } else {
                    el.classList.remove('is-invalid');
                    el.classList.add('is-valid');
                    campos[el.name || el.id] = el.value;
                }
            });

            if (!valido) return;

            fetch('procesar_formulario22.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams(campos)
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('resultado').innerHTML = data;
                })
                .catch(error => {
                    document.getElementById('resultado').innerHTML = 'Error al enviar el formulario.';
                });
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Validación para campos de texto
            document.querySelectorAll('input[type="text"]').forEach(input => {
                input.addEventListener('input', () => {
                    if (input.value.trim()) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                    }
                });
            });

            // Validación para campos de fecha
            document.querySelectorAll('input[type="date"]').forEach(input => {
                input.addEventListener('change', () => {
                    if (input.value.trim()) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                    }
                });
            });

            // Validación para campos select
            document.querySelectorAll('select').forEach(select => {
                select.addEventListener('change', () => {
                    if (select.value.trim()) {
                        select.classList.remove('is-invalid');
                        select.classList.add('is-valid');
                    } else {
                        select.classList.remove('is-valid');
                        select.classList.add('is-invalid');
                    }
                });
            });
        });
    </script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
    <script src="../css/bootstrap_5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>