document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Validar el formulario
            if (validateForm(this)) {
                // Crear un objeto FormData con los datos del formulario
                const formData = new FormData(this);
                
                // Configurar la solicitud fetch
                fetch('procesar_formulario22.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Manejar la respuesta del servidor
                    console.log(`Respuesta del servidor para ${this.id}:`, data);
                    alert(`Formulario ${this.id} enviado con éxito`);
                })
                .catch(error => {
                    // Manejar errores
                    console.error('Error:', error);
                    alert(`Error al enviar el formulario ${this.id}`);
                });
            } else {
                alert('Por favor, completa todos los campos requeridos.');
            }
        });
    });
});

function validateForm(form) {
    let isValid = true;
    form.classList.add('was-validated');
    form.querySelectorAll('input').forEach(input => {
        if (!input.checkValidity()) {
            isValid = false;
        }
    });
    return isValid;
}

function nextTab(tabId) {
    const tab = new bootstrap.Tab(document.getElementById(tabId));
    tab.show();
}
