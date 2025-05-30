<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formularios en Pestañas</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/bootstrap_5.3.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="formTabs" role="tablist">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form1">Formulario 1</button></li>
            <li class="nav-item"><button class="nav-link disabled" data-bs-toggle="tab" data-bs-target="#form2">Formulario 2</button></li>
            <li class="nav-item"><button class="nav-link disabled" data-bs-toggle="tab" data-bs-target="#form3">Formulario 3</button></li>
            <li class="nav-item"><button class="nav-link disabled" data-bs-toggle="tab" data-bs-target="#form4">Formulario 4</button></li>
            <li class="nav-item"><button class="nav-link disabled" data-bs-toggle="tab" data-bs-target="#form5">Formulario 5</button></li>
        </ul>

        <div class="tab-content mt-3" id="formTabsContent">
            <!-- Repetimos el formulario con nombres de campos consistentes -->
            <!-- Formulario 1 -->
            <div class="tab-pane fade show active" id="form1">
                <form id="form-1" class="needs-validation" novalidate>
                    <div class="mb-3"><label>Texto</label><input type="text" class="form-control" name="text1" required></div>
                    <div class="mb-3"><label>Selecciona</label>
                        <select class="form-select" name="select1" required>
                            <option value="">Elige una opción</option>
                            <option value="op1">Opción 1</option>
                            <option value="op2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3"><label>Fecha</label><input type="date" class="form-control" name="date1" required></div>
                    <div class="mb-3"><label>Número</label><input type="number" class="form-control" name="number1" required></div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(1)">Siguiente</button>
                </form>
            </div>

            <!-- Formulario 2 -->
            <div class="tab-pane fade" id="form2">
                <form id="form-2" class="needs-validation" novalidate>
                    <div class="mb-3"><label>Texto</label><input type="text" class="form-control" name="text2" required></div>
                    <div class="mb-3"><label>Selecciona</label>
                        <select class="form-select" name="select2" required>
                            <option value="">Elige una opción</option>
                            <option value="op1">Opción 1</option>
                            <option value="op2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3"><label>Fecha</label><input type="date" class="form-control" name="date2" required></div>
                    <div class="mb-3"><label>Número</label><input type="number" class="form-control" name="number2" required></div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(2)">Siguiente</button>
                </form>
            </div>

            <!-- Formulario 3 -->
            <div class="tab-pane fade" id="form3">
                <form id="form-3" class="needs-validation" novalidate>
                    <div class="mb-3"><label>Texto</label><input type="text" class="form-control" name="text3" required></div>
                    <div class="mb-3"><label>Selecciona</label>
                        <select class="form-select" name="select3" required>
                            <option value="">Elige una opción</option>
                            <option value="op1">Opción 1</option>
                            <option value="op2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3"><label>Fecha</label><input type="date" class="form-control" name="date3" required></div>
                    <div class="mb-3"><label>Número</label><input type="number" class="form-control" name="number3" required></div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(3)">Siguiente</button>
                </form>
            </div>

            <!-- Formulario 4 -->
            <div class="tab-pane fade" id="form4">
                <form id="form-4" class="needs-validation" novalidate>
                    <div class="mb-3"><label>Texto</label><input type="text" class="form-control" name="text4" required></div>
                    <div class="mb-3"><label>Selecciona</label>
                        <select class="form-select" name="select4" required>
                            <option value="">Elige una opción</option>
                            <option value="op1">Opción 1</option>
                            <option value="op2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3"><label>Fecha</label><input type="date" class="form-control" name="date4" required></div>
                    <div class="mb-3"><label>Número</label><input type="number" class="form-control" name="number4" required></div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(4)">Siguiente</button>
                </form>
            </div>

            <!-- Formulario 5 -->
            <div class="tab-pane fade" id="form5">
                <form id="form-5" class="needs-validation" novalidate>
                    <div class="mb-3"><label>Texto</label><input type="text" class="form-control" name="text5" required></div>
                    <div class="mb-3"><label>Selecciona</label>
                        <select class="form-select" name="select5" required>
                            <option value="">Elige una opción</option>
                            <option value="op1">Opción 1</option>
                            <option value="op2">Opción 2</option>
                        </select>
                    </div>
                    <div class="mb-3"><label>Fecha</label><input type="date" class="form-control" name="date5" required></div>
                    <div class="mb-3"><label>Número</label><input type="number" class="form-control" name="number5" required></div>
                    <button type="button" class="btn btn-success" onclick="submitAllForms()">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const forms = [1, 2, 3, 4, 5];

        forms.forEach(i => {
            document.getElementById(`form-${i}`).addEventListener('input', e => {
                const input = e.target;
                if (input.checkValidity()) {
                    input.classList.add('is-valid');
                    input.classList.remove('is-invalid');
                } else {
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                }
            });
        });

        function nextTab(current) {
            const form = document.getElementById(`form-${current}`);
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            const next = current + 1;
            const tabButtons = document.querySelectorAll('.nav-link');
            tabButtons[next - 1].classList.remove('disabled');
            tabButtons[next - 1].click();
        }

        async function submitAllForms() {
            const data = new FormData();
            for (let i = 1; i <= 5; i++) {
                const form = document.getElementById(`form-${i}`);
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }
                new FormData(form).forEach((value, key) => data.append(key, value));
            }

            const response = await fetch('procesa_formularioG.php', {
                method: 'POST',
                body: data
            });

            const result = await response.text();
            alert('Respuesta del servidor:\n' + result);
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

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="../css/bootstrap_5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>