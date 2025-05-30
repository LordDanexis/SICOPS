document.addEventListener("DOMContentLoaded", function () {
  const campoPrincipal = document.getElementById("campo13");
  const campo1 = document.getElementById("campo14");
  const campo2 = document.getElementById("campo15");
  const campo3 = document.getElementById("campo16");

  campoPrincipal.addEventListener("input", function () {
    const valor = campoPrincipal.value.trim().toUpperCase();

    switch (valor) {
        case "A.1":
     // Campo 1: valor por defecto
     campo1.value = "Valor por defecto";

      // Campo 2: 2 opciones
      campo2.innerHTML = `
        <option value="op1">sub a.1</option>
        <option value="op2">otro sub a.1</option>
      `;

      // Campo 3: 4 opciones
      campo3.innerHTML = `
        <option value="op1">jefe 1 a.1</option>
        <option value="op2">jefe 2 a.1</option>
        <option value="op3">jefe 3 a.1</option>
        <option value="op4">jefe 4 a.1</option>
      `;
		
      break;

		case "A.2":

      // Campo 1: valor por defecto
      campo1.value = "Valor por defecto a.2";

      // Campo 2: 2 opciones
      campo2.innerHTML = `
        <option value="op1">sub a.2</option>
        <option value="op2">otro sub a.2</option>
      `;

      // Campo 3: 4 opciones
      campo3.innerHTML = `
        <option value="op1">jefe 1 a.2</option>
        <option value="op2">jefe 2 a.2</option>
        <option value="op3">jefe 3 a.2</option>
        <option value="op4">jefe 4 a.2</option>
      `;
     	break;
        
        default:
			$valor = "";
    }
  });
});
