<?php
echo print_r('Hello');



// procesa_pdf.php

// Incluye conexión a la base de datos o funciones según sea necesario
// require_once('../includes/conexion.php');
// require_once('../includes/funciones.php');

// // // Verificar que el método de la solicitud es POST
// // if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
// //     die("Error: Método de solicitud no permitido.");
// // }

// // Verificar que la solicitud se ha realizado por POST
// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     echo "<script>
//             alert('Error: Método de solicitud no permitido.');
//             window.history.back();
//           </script>";
//     exit;
// }

// // Validar que se hayan recibido las variables requeridas
// $camposRequeridos = ['consecutivo', 'folio', 'procedimiento', 'fecha_actual'];
// foreach ($camposRequeridos as $campo) {
//     if (!isset($_POST[$campo]) || empty(trim($_POST[$campo]))) {
//         die("Error: La variable '$campo' es obligatoria.");
//     }
// }

// // Asignar variables utilizando los datos recibidos
// $consecutivo   = $_POST['consecutivo'];
// $folio         = $_POST['folio'];
// $procedimiento = $_POST['procedimiento'];
// $fecha_actual  = $_POST['fecha_actual'];

// // Validar que se haya recibido el archivo correctamente
// if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
//     die("Error: No se recibió el archivo o hubo un error en la carga.");
// }

// //Para depuración, puedes activar estos var_dump y después comentar
// var_dump($_POST);
// var_dump($_FILES);

// // Definir la carpeta de destino (por ejemplo, una carpeta por cada folio)
// $carpetaDestino = "uploads/$folio/";

// // Crear la carpeta si no existe, con permisos adecuados
// if (!is_dir($carpetaDestino)) {
//     if (!mkdir($carpetaDestino, 0777, true)) {
//         die("Error: No se pudo crear la carpeta de destino.");
//     }
// }

// // Procesar el archivo
// $nombreArchivo = basename($_FILES['archivo']['name']);
// $nuevoNombre   = uniqid() . "-" . $nombreArchivo;
// $rutaCompleta  = $carpetaDestino . $nuevoNombre;

// // Mover el archivo desde la ubicación temporal a la carpeta destino
// if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaCompleta)) {
//     // Aquí puedes insertar la información en la base de datos u otros procesos.
//     // Por ejemplo:  
//     // $query = "INSERT INTO archivos (consecutivo, folio, procedimiento, fecha, ruta) 
//     //           VALUES ('$consecutivo', '$folio', '$procedimiento', '$fecha_actual', '$rutaCompleta')";
//     // if ($conexion->query($query)) {
//     //     echo "Archivo subido y registrado exitosamente.";
//     // } else {
//     //     echo "Error al guardar en la base de datos: " . $conexion->error;
//     // }

//     echo "Archivo subido correctamente a: $rutaCompleta. <br>";
//     echo "Variables recibidas: <br>";
//     echo "Consecutivo: $consecutivo <br>";
//     echo "Folio: $folio <br>";
//     echo "Procedimiento: $procedimiento <br>";
//     echo "Fecha: $fecha_actual <br>";
// } else {
//     die("Error: No se pudo mover el archivo a la carpeta destino.");
// }
