<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios en Pestañas</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/bootstrap_5.3.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">Formulario 1</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false" disabled>Formulario 2</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false" disabled>Formulario 3</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false" disabled>Formulario 4</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-controls="tab5" aria-selected="false" disabled>Formulario 5</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab6-tab" data-bs-toggle="tab" data-bs-target="#tab6" type="button" role="tab" aria-controls="tab6" aria-selected="false" disabled>Formulario 6</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <form id="form1">
                    <div class="mb-3">
                        <label for="input1" class="form-label">Campo 1</label>
                        <input type="text" class="form-control" id="input1" name="input1">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(2)">Siguiente</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <form id="form2">
                    <div class="mb-3">
                        <label for="input2" class="form-label">Campo 2</label>
                        <input type="text" class="form-control" id="input2" name="input2">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(3)">Siguiente</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <form id="form3">
                    <div class="mb-3">
                        <label for="input3" class="form-label">Campo 3</label>
                        <input type="text" class="form-control" id="input3" name="input3">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(4)">Siguiente</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                <form id="form4">
                    <div class="mb-3">
                        <label for="input4" class="form-label">Campo 4</label>
                        <input type="text" class="form-control" id="input4" name="input4">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(5)">Siguiente</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                <form id="form5">
                    <div class="mb-3">
                        <label for="input5" class="form-label">Campo 5</label>
                        <input type="text" class="form-control" id="input5" name="input5">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextTab(6)">Siguiente</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
                <form id="form6">
                    <div class="mb-3">
                        <label for="input6" class="form-label">Campo 6</label>
                        <input type="text" class="form-control" id="input6" name="input6">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="../css/bootstrap_5.3.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function nextTab(tabIndex) {
            document.getElementById(`tab${tabIndex}-tab`).disabled = false;
            var tab = new bootstrap.Tab(document.getElementById(`tab${tabIndex}-tab`));
            tab.show();
        }
    </script>
</body>

</html>