document.addEventListener("DOMContentLoaded", function () {
  const campoPrincipal = document.getElementById("campo13");
  const campo1 = document.getElementById("campo14");
  const campo2 = document.getElementById("campo15");
  const campo3 = document.getElementById("campo16");

  function actualizarCampos(valor) {
    valor = valor.trim().toUpperCase();

        switch (valor) {
        case "A.1":
     // Campo 1: valor por defecto
      campo1.value = "Alfonso Javier Arredondo Huerta";

      // Campo 2: 2 opciones
      campo2.innerHTML = `
        <option value="op1">Daniela Armas Rendón</option>
        <option value="op2">Ivonne Celis Morales</option>
      `;

      // Campo 3: 4 opciones
      campo3.innerHTML = `
        <option value="Cuauhtémoc Correa Sánchez">Cuauhtémoc Correa Sánchez</option>
        <option value="Jazmín Ruiz Córdova">Jazmín Ruiz Córdova</option>
        <option value="Raúl Israel Mancilla Salazar">Raúl Israel Mancilla Salazar</option>
        <option value="José Manuel Palafox Pichardo">José Manuel Palafox Pichardo</option>
      `;
		
      break;

		case "A.2":

      // Campo 1: valor por defecto
      campo1.value = "Isaid Rodríguez Esquivel";

      // Campo 2: 2 opciones
      campo2.innerHTML = `
        <option value="Jazmín Alejandra Arriaga Hernández">Jazmín Alejandra Arriaga Hernández</option>
        <option value="Jorge Jiménez Santana">Jorge Jiménez Santana</option>
      `;

      // Campo 3: 4 opciones
      campo3.innerHTML = `
        <option value="Irving Alcántara González">Irving Alcántara González</option>
        <option value="Mario Jair Hernández Ibañez">Mario Jair Hernández Ibañez</option>
        <option value="Janin Jounuen Silva González">Janin Jounuen Silva González</option>
        <option value="Carlo Iván Muraira Torres">Carlo Iván Muraira Torres</option>
      `;
     	break;
        
        default:
			$valor = "";
    }
  }

  // Detectar cambios en tiempo real
  campoPrincipal.addEventListener("input", function () {
    actualizarCampos(campoPrincipal.value);
  });

  // Ejecutar al cargar la página con el valor por defecto
  actualizarCampos(campoPrincipal.value);
});
