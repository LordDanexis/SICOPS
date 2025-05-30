<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dynamic Checkboxes with Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function updateCheckboxes() {
            // Obtener la opción seleccionada
            var select = document.getElementById("mySelect");
            var selectedOption = select.options[select.selectedIndex].value;

            // Contenedor de los checkboxes
            var checkboxesContainer = document.getElementById("checkboxesContainer");
            checkboxesContainer.innerHTML = ""; // Limpiar los checkboxes existentes

            // Datos de ejemplo (puedes obtenerlos desde una base de datos)
            var data = {
                "opcion1": ["Checkbox 1.1", "Checkbox 1.2", "Checkbox 1.3", "Checkbox 1.4", "Checkbox 1.5", "Checkbox 1.6"],
                "opcion2": ["Checkbox 2.1", "Checkbox 2.2", "Checkbox 2.3", "Checkbox 2.4", "Checkbox 2.5", "Checkbox 2.6"],
                "opcion3": ["Checkbox 3.1", "Checkbox 3.2", "Checkbox 3.3", "Checkbox 3.4", "Checkbox 3.5", "Checkbox 3.6"]
            };

            // Generar los nuevos checkboxes
            var checkboxes = data[selectedOption];
            var row;

            for (var i = 0; i < checkboxes.length; i++) {
                if (i % 2 === 0) {
                    row = document.createElement("div");
                    row.className = "row mb-3";
                    checkboxesContainer.appendChild(row);
                }

                var col = document.createElement("div");
                col.className = "col-auto";

                var checkboxDiv = document.createElement("div");
                checkboxDiv.className = "form-check";

                var checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                checkbox.className = "form-check-input";
                checkbox.name = "checks[]";
                checkbox.value = checkboxes[i];
                checkboxDiv.appendChild(checkbox);

                var label = document.createElement("label");
                label.className = "form-check-label";
                label.innerHTML = checkboxes[i];
                checkboxDiv.appendChild(label);

                col.appendChild(checkboxDiv);
                row.appendChild(col);
            }
        }
    </script>
</head>

<body>
    <div class="container mt-3">
        <div class="mb-3">
            <label for="mySelect" class="form-label">Selecciona una opción:</label>
            <select id="mySelect" class="form-select" onchange="updateCheckboxes()">
                <option value="opcion1">Opción 1</option>
                <option value="opcion2">Opción 2</option>
                <option value="opcion3">Opción 3</option>
            </select>
        </div>

        <div id="checkboxesContainer"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>