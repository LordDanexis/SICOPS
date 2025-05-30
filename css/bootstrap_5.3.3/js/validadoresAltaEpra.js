
      //FUNCIÓN QUE BLOQUEA LAS PESTAÑAS SIGUIENTES PARA CONTINUAR EL PASO A PASO DENTRO DE LOS FORMULARIOS PARA DAR DE ALTA EL EPRA
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
      //TERMINA FUNCIÓN 0QUE BLOQUEA LAS PESTAÑAS SIGUIENTES PARA CONTINUAR EL PASO A PASO DENTRO DE LOS FORMULARIOS PARA DAR DE ALTA EL EPRA



      //FUNCIÓN QUE ENVIA LOS DATOS DE TODOS LOS INPUT DE LOS FORMULARIOS PARA PROCESARLOS EN EL ARCHIVO:  procesar_formulario.php y hacer la Inserción en la Base de Datos    
      function enviarFormulario() {
        const campos = {};
        let valido = true;

        // Recolectar todos los inputs y selects de todos los formularios
        const formularios = ['form1', 'form2', 'form3', 'form4', 'form5'];
        formularios.forEach(formId => {
          const form = document.getElementById(formId);
          const elementos = form.querySelectorAll('input, select');
          elementos.forEach(el => {
            const value = el.value.trim();
            let isValid = true;

            if (el.type === 'number') {
              const numberValue = parseFloat(value);
              isValid = value !== '' && !isNaN(numberValue);
            } else {
              isValid = value !== '';
            }

            if (!isValid) {
              el.classList.add('is-invalid');
              el.classList.remove('is-valid');
              valido = false;
            } else {
              el.classList.remove('is-invalid');
              el.classList.add('is-valid');
              campos[el.name] = value;
            }
          });
        });

        if (!valido) return;

        // Enviar datos al servidor
        fetch('../Alta_PRA/procesar_formulario.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(campos)
          })
          .then(response => response.text())
          .then(data => {
            console.log('Respuesta del servidor:', data);
            document.getElementById('resultado').innerHTML = data;
          })
          .catch(error => {
            document.getElementById('resultado').innerHTML = 'Error al enviar el formulario.';
            console.error('Error en el envío:', error);
          });
      }
      //TERMINA FUNCIÓN QUE ENVIA LOS DATOS DE TODOS LOS INPUT DE LOS FORMULARIOS PARA PROCESARLOS EN EL ARCHIVO:  procesar_formulario.php y hacer la Inserción en la Base de Datos 


      //***********************ESTAS SON LAS VALIDACIONES PARA CADA UNO DE LOS CAMPOS DE LOS FORMULARIOS Y SUS DISTINTOS TIPOS DE INPUT************************/

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

        // Validación para campos de número
        document.querySelectorAll('input[type="number"]').forEach(input => {
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
      });
 