<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     //     $datos = $_POST;
//     //     echo "Datos recibidos correctamente:\n";
//     //     foreach ($datos as $clave => $valor) {
//     //         echo "$clave: $valor\n";
//     //     }
//     // } else {
//     //     echo "Método no permitido.";



// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger y almacenar los datos en variables
    $text1 = $_POST['text1'] ?? '';
    $select1 = $_POST['select1'] ?? '';
    $date1 = $_POST['date1'] ?? '';
    $number1 = $_POST['number1'] ?? '';

    $text2 = $_POST['text2'] ?? '';
    $select2 = $_POST['select2'] ?? '';
    $date2 = $_POST['date2'] ?? '';
    $number2 = $_POST['number2'] ?? '';

    $text3 = $_POST['text3'] ?? '';
    $select3 = $_POST['select3'] ?? '';
    $date3 = $_POST['date3'] ?? '';
    $number3 = $_POST['number3'] ?? '';

    $text4 = $_POST['text4'] ?? '';
    $select4 = $_POST['select4'] ?? '';
    $date4 = $_POST['date4'] ?? '';
    $number4 = $_POST['number4'] ?? '';

    $text5 = $_POST['text5'] ?? '';
    $select5 = $_POST['select5'] ?? '';
    $date5 = $_POST['date5'] ?? '';
    $number5 = $_POST['number5'] ?? '';

    // Aquí podrías insertar los datos en una base de datos
    // Ejemplo:
    // $conexion = new mysqli('localhost', 'usuario', 'contraseña', 'basedatos');
    // $stmt = $conexion->prepare("INSERT INTO tabla (...) VALUES (?, ?, ...)");
    // $stmt->bind_param("ssss...", $text1, $select1, ...);
    // $stmt->execute();

    // Para propósitos de prueba, mostramos los datos recibidos
    echo "Datos recibidos correctamente:\n";
    for ($i = 1; $i <= 5; $i++) {
        echo "Formulario $i:\n";
        echo "Texto: " . ${"text$i"} . "\n";
        echo "Select: " . ${"select$i"} . "\n";
        echo "Fecha: " . ${"date$i"} . "\n";
        echo "Número: " . ${"number$i"} . "\n\n";
    }
} else {
    echo "Método no permitido.";
}
