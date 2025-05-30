

(() => {
  'use strict'


  const forms = document.querySelectorAll('.needs-validation')


  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

//*************VALIDADORES QUE SACAN LAS VALIDACIONES DE BOOTSTRAP 5.3 EN LOS FORMULARIOS DE LA ALTA DE EPRA, DONDE ESTÁN TODAS LAS PESTAÑAS*************************
  
// document.addEventListener('DOMContentLoaded', () => {
//     // Validación para campos de texto
//     document.querySelectorAll('input[type="text"]').forEach(input => {
//       input.addEventListener('input', () => {
//         if (input.value.trim()) {
//           input.classList.remove('is-invalid');
//           input.classList.add('is-valid');
//         } else {
//           input.classList.remove('is-valid');
//           input.classList.add('is-invalid');
//         }
//       });
//     });

//     // Validación para campos de fecha
//     document.querySelectorAll('input[type="date"]').forEach(input => {
//       input.addEventListener('change', () => {
//         if (input.value.trim()) {
//           input.classList.remove('is-invalid');
//           input.classList.add('is-valid');
//         } else {
//           input.classList.remove('is-valid');
//           input.classList.add('is-invalid');
//         }
//       });
//     });

//     // Validación para campos select
//     document.querySelectorAll('select').forEach(select => {
//       select.addEventListener('change', () => {
//         if (select.value.trim()) {
//           select.classList.remove('is-invalid');
//           select.classList.add('is-valid');
//         } else {
//           select.classList.remove('is-valid');
//           select.classList.add('is-invalid');
//         }
//       });
//     });
//   });

  //*******************TERMINAN LOS VALIDADORES QUE SACAN LAS VALIDACIONES DE BOOTSTRAP 5.3 EN LOS FORMULARIOS DE LA ALTA DE EPRA, DONDE ESTÁN TODAS LAS PESTAÑAS***********
