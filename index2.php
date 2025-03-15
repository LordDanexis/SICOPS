<!DOCTYPE html>
<html lang="es">

<head>
    <title>Dependencia de Select</title>
    <script>
        // Datos de ejemplo en un objeto
        const datos = {
            "Opción1": ["Valor1-1", "Valor1-2"],
            "Opción2": ["Valor2-1", "Valor2-2"],
            "Opción3": ["Valor3-1", "Valor3-2"]
        };

        // Función para actualizar el segundo select
        function actualizarSelect() {
            const select1 = document.getElementById("select1");
            const select2 = document.getElementById("select2");
            const seleccion = select1.value; // Valor seleccionado

            // Limpia las opciones actuales
            select2.innerHTML = "";

            // Agrega las opciones nuevas
            if (datos[seleccion]) {
                datos[seleccion].forEach(function(opcion) {
                    const nuevaOpcion = document.createElement("option");
                    nuevaOpcion.value = opcion;
                    nuevaOpcion.textContent = opcion;
                    select2.appendChild(nuevaOpcion);
                });
            }
        }
    </script>
</head>

<body>
    <form>
        <!-- Primer select -->
        <select id="select1" onchange="actualizarSelect()">
            <option value="">Selecciona una opción</option>
            <option value="Opción1">Opción 1</option>
            <option value="Opción2">Opción 2</option>
            <option value="Opción3">Opción 3</option>
        </select>

        <!-- Segundo select -->
        <select id="select2">
            <option value="">Selecciona primero del otro</option>
        </select>
    </form>
</body>

</html>