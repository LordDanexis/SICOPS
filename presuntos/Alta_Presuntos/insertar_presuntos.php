<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);

    // Aquí puedes añadir lógica para almacenar los datos en una base de datos o enviarlos por correo electrónico.
    echo "Gracias, $nombre. Hemos recibido tu correo: $email.";
}
