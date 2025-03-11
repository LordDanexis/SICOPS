<?php
// require_once('conexion.php');
// if (!empty($_POST["btnactualizar"])) {
//     if (!empty($_POST["folio"]) and !empty($_POST["procedimiento"]) and !empty($_POST["fecha"]) and !empty($_POST["destinatario"]) and !empty($_POST["cargo"]) and !empty($_POST["dependencia"]) and !empty($_POST["nivel"]) and !empty($_POST["observaciones"]) and !empty($_POST["asunto"]) and !empty($_POST["solicitante"]) and !empty($_POST["firma"])) {
//         $id = $_POST["id"];
//         $folio = $_POST["folio"];
//         $procedimiento = $_POST["procedimiento"];
//         $fechaOficio = $_POST["fecha"];
//         $destinatario = $_POST["destinatario"];
//         $cargo =  $_POST["cargo"];
//         $dependencia = $_POST["dependencia"];
//         $nivel = $_POST["nivel"];
//         $observaciones = $_POST["observaciones"];
//         $asunto = $_POST["asunto"];
//         $abogado = $_POST["solicitante"];
//         $firma = $_POST["firma"];
//         $sql = $conexion->query("UPDATE oficios set folio='$folio', procedimiento ='$procedimiento', fecha_oficio ='$fechaOficio', destinatario ='$destinatario', cargo_destinatario ='$cargo', dependencia ='$dependencia', nivel ='$nivel', observaciones ='$observaciones', asunto ='$asunto', abogado_solicitante ='$abogado', firma_oficio ='$firma' WHERE consecutivo = '$id' ");
//         if ($sql == 1) {
//             $mensaje = "¡ACTUALIZASTE CORRECTAMENTE EL REGISTRO!";
//             echo "<script type='text/javascript'>alert('$mensaje');</script>";
//             header("Location:OficiosB.php");
//         } else {
//             echo "<div class='alert alert-warning'>Error al Modificar</div>";
//         }
//     } else {

//         echo "<div class='alert alert-warning'>Los Campos están Vacios </div>";
//     }
//     // echo "Hola lo presione";
// }

require_once('conexion.php');

if (!empty($_POST["btnactualizar"])) {
    $id = $_POST["id"];
    $folio = $_POST["folio"];
    $procedimiento = $_POST["procedimiento"];
    $fechaOficio = $_POST["fecha"];
    $destinatario = $_POST["destinatario"];
    $cargo =  $_POST["cargo"];
    $dependencia = $_POST["dependencia"];
    $nivel = $_POST["nivel"];
    $observaciones = $_POST["observaciones"];
    $asunto = $_POST["asunto"];
    $abogado = $_POST["solicitante"];
    $firma = $_POST["firma"];
    $status = $_POST["status"];
    $sql = $conexion->query("UPDATE oficios set folio='$folio', procedimiento ='$procedimiento', fecha_oficio ='$fechaOficio', destinatario ='$destinatario', cargo_destinatario ='$cargo', dependencia ='$dependencia', nivel ='$nivel', observaciones ='$observaciones', asunto ='$asunto', abogado_solicitante ='$abogado', firma_oficio ='$firma', status ='$status'  WHERE consecutivo = '$id' ");
    if ($sql == 1) {
        header("Location:OficiosB.php");
        $mensaje = "¡ACTUALIZASTE CORRECTAMENTE EL REGISTRO!";
        echo "<script type='text/javascript'>alert('$mensaje');</script>";
    } else {
        echo "<div class='alert alert-warning'>Error al Modificar</div>";
    }
}
