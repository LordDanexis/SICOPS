<?php
require_once('../includes/conexion.php');
require_once('../../encabezados/includes/hora.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $accion       = $_POST['campo1']  ?? '';
    $cp           = $_POST['campo2']  ?? '';
    $auditoria    = $_POST['campo3']  ?? '';
    $epra         = $_POST['campo4']  ?? '';
    $entidad      = $_POST['campo5']  ?? '';
    $monto        = $_POST['campo6']  ?? '';
    $iprasrecib   = $_POST['campo7']  ?? '';
    $direccionDGI = $_POST['campo10'] ?? '';
    $oficioDGI    = $_POST['campo11'] ?? '';
    $fechOfiDGI   = $_POST['campo12'] ?? '';
    $direccion    = $_POST['campo13'] ?? '';
    $director     = $_POST['campo14'] ?? '';
    $subdirector  = $_POST['campo15'] ?? '';
    $jefedepto    = $_POST['campo16'] ?? '';
    $responsable  = $_POST['campo17'] ?? '';
    $responsable2 = $_POST['campo18'] ?? '';
    $dictamen     = $_POST['campo19'] ?? '';
    $tituloaudi   = $_POST['campo20'] ?? '';
    $tipoaudi     = $_POST['campo21'] ?? '';
    $daño         = $_POST['campo22'] ?? '';
    $dañoa        = $_POST['campo23'] ?? '';
    $notomos      = $_POST['campo24'] ?? '';
    $nocopiastras = $_POST['campo25'] ?? '';
    $nopresuntos  = $_POST['campo26'] ?? '';
    $fechaAsig    = date('Y-m-d');    // Muestra la fecha en formato (YYYY/MM/DD)
    $horaAsig     = date("g:i:s A"); // Muestra la hora en formato 12 horas (AM/PM)
    $fecharecep   =  '';

    $sql = $conexion->query("INSERT INTO pra SET accion ='$accion', cp ='$cp', auditoria ='$auditoria', epra ='$epra', entidad ='$entidad', monto_glob_epra ='$monto', ipras_recibidos ='$iprasrecib', fecha_recep_epra ='$fecharecep', fecha_asig_epra ='$fechasig', direccion_dgi ='$direccionDGI', oficio_dgi ='$oficioDGI', fecha_oficio_dgi ='$fechOfiDGI', direccion ='$direccion', director ='$director', subdirector ='$subdirector', jefe_depto ='$jefedepto', abogado_responsable ='$responsable', abogado_responsable_2 ='$responsable2', num_DT ='$dictamen', titulo_auditoria ='$tituloaudi', tipo_auditoria ='$tipoaudi', tipo_daño ='$daño', daño_perjuicio ='$dañoa', tomos_epra ='$notomos', copias_traslado ='$nocopiastras', no_presuntos ='$nopresuntos', fecha ='$fechaActual', hora = '$horaActual'");
    if ($sql == 1) {
        echo "<div class='alert alert-success'>PRA Registrada Correctamente</div>";
    } else {
        echo "<div class='alert alert-warning'>Error al Registrar Persona</div>";
    }
}

//RECORRE TODOS LOS CAMPOS INGRESADOS E IMPREME EL NOMBRE DEL CAMPO Y EL VALOR EN UNA LISTA
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     echo "<h5>Datos recibidos:</h5><ul>";
//     foreach ($_POST as $campo => $valor) {
//         echo "<li><strong>$campo:</strong> " . htmlspecialchars($valor) . "</li>";
//     }
//     echo "</ul>";
// } else {
//     echo "Acceso no permitido.";
// }
