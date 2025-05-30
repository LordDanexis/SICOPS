<?php
//----------------------VARIABLES GLOBALES QUE SE TRAEN DESDE EL INDEX---------------------------------------
require_once('../../includes/conexion.php');
date_default_timezone_set("America/Mexico_City"); //Cambia el Reloj a la ciudad de México
session_start();
$nivel = $_SESSION['nivel'];
$nombre = $_SESSION['nombre'];
$direccion = $_SESSION['direccion'];
$usuario = $_SESSION['usuario'];
//----------------------VARIABLERS GLOBALES QUE SE TRAÉN DESDE EL INDEX--------------------------------------

//****************************** CONEXIÓN A LAS BASES DE DATOS **********************************************
// $sql2 = "SELECT * FROM usuarios WHERE Status != 0 ORDER BY nombre";
// $result2 = $conexion->query($sql2);

// $sql3 = "SELECT * FROM usuarios WHERE Status != 0 ORDER BY nombre";
// $result3 = $conexion->query($sql3);
$sql1 =  "SELECT * FROM pra";
$result = $conexion->query($sql1);

$sql4 = "SELECT * FROM faltas_admin";
$result4 = $conexion->query($sql4);

$sql5 = "SELECT * FROM tipos_auditoria ORDER BY tipo";
$result5 = $conexion->query($sql5);

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$resultado  = $conexion->query($sql);
$resultado2 = $conexion->query($sql);
$resultado3 = $conexion->query($sql);
$resultado4 = $conexion->query($sql);

//***********************TERMINA CONEXIÓN A LAS BASES DE DATOS **********************************************
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alta de PRA</title>
  <link rel="stylesheet" href="../../css/bootstrap_5.3.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
  <?php include '../../encabezados/encabezadoModulos.php'; ?>
  <div class="container text-center">

    <div class="row row-cols-2">
      <div class="col-6 mt-4">
        <h2>Alta de Procedimiento de Responsabilidad Administrativa (PRA) </h2>
      </div>
      <div class="col mt-4"><a href="../../index.php" class="btn btn-dark">Regresar</a></div>
    </div>

    <ul class="nav nav-tabs mb-3" id="formTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1" type="button">VALIDACIÓN DE DATOS</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link disabled" data-bs-toggle="tab" data-bs-target="#tab2" type="button">RECEPCIÓN Y ASIGNACIÓN</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link disabled" data-bs-toggle="tab" data-bs-target="#tab3" type="button">DT</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link disabled" data-bs-toggle="tab" data-bs-target="#tab4" type="button">IPRA Y EPRA</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link disabled" data-bs-toggle="tab" data-bs-target="#tab5" type="button">PRESUNTOS</button>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">

      <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
        <form id="form1">
          <div class="row mt-4">
            <h3>VALIDACIÓN DE DATOS:</h3>
          </div>
          <div class="row mt-2">
            <div class="col-6">
              <label for="campo1" class="form-label">Clave de Acción:</label>
              <input type="text" class="form-control" id="campo1" name="campo1" oninput="activarModalAltaPresunto()">
              <div class="invalid-feedback"> Se debe de Capturar la Clave de Acción</div>
            </div>

            <div class="col-6 mb-3">
              <label for="campo2" class="form-label">Cuenta Pública (CP):</label>
              <input type="text" class="form-control" id="campo2" name="campo2" placeholder="Cuenta Pública" readonly>
            </div>

            <div class="col-6">
              <label for="campo3" class="form-label">No. Auditoria:</label>
              <input type="text" class="form-control" id="campo3" name="campo3" placeholder="No. Auditoria:" readonly>
            </div>

            <div class="col-6 mb-3">
              <label for="campo4" class="form-label">EPRA:</label>
              <input type="text" class="form-control" id="campo4" name="campo4" placeholder="Expediente de Presunta Responsabilidad Administrativa" readonly>
            </div>

            <div class="col-6">
              <label for="campo5" class="form-label">Entidad Fiscalizada:</label>
              <input type="text" class="form-control" id="campo5" name="campo5" placeholder="Entidad Fizcalizada" readonly>
            </div>

            <div class="col-6 mb-3">
              <label for="campo6" class="form-label">Monto Global del EPRA:</label>
              <div class="input-group col 2">
                <span class=" input-group-text">$</span>
                <input type="text" id="campo6" name="campo6" class="form-control" aria-label="Cantidad en Pesos">
                <div class="invalid-feedback">Se debe de Capturar el monto global del EPRA.</div>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary" name="siguiente1" value="ok" onclick="nextTab(1)">Siguiente</button>
        </form>
      </div>

      <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
        <form id="form2">
          <div class="row mt-4">
            <h3>DATOS DE RECEPCIÓN Y ASIGNACIÓN:</h3>
          </div>
          <div class="row mt-2">

            <div class="col-6">
              <label for="campo7" class="form-label">Direccion DGSUB "A":</label>
              <?php echo ' <input type="text" class="form-control" name="campo7" id="campo7" value="' . $nivel . '" readonly>'; ?>
              <div class="invalid-feedback">Se debe capturar la dirección a la cuál esta asginado el EPRA.</div>
            </div>

            <div class="col-6 mb-3">
              <label for="campo8" class="form-label">Director:</label>
              <?php while ($r = $resultado->fetch_assoc()) { ?>
                <?php echo ' <input type="text" class="form-control" name="campo8" id="campo8" value="' .  $r['director'] . '">'; ?>
              <?php } ?>
              <div class="invalid-feedback">Se debe capturar el director que tendra asignado el EPRA.</div>
            </div>

            <div class="col-6">
              <label for="campo9" class="form-label">Subdirector u homólogo:</label>
              <?php while ($r2 = $resultado2->fetch_assoc()) { ?>
                <?php echo ' <input type="text" class="form-control" name="campo9" id="campo9" value="' .  $r2['sub_adscrito'] . '">'; ?>
              <?php } ?>
              <div class="invalid-feedback">Se debe capturar el subdirector que tendra asignado el EPRA.</div>
            </div>

            <div class="col-6 mb-3">
              <label for="campo10" class="form-label">Jefe de Departamento u homólogo:</label>
              <?php while ($r3 = $resultado3->fetch_assoc()) { ?>
                <?php echo ' <input type="text" class="form-control" name="campo10" id="campo10" value="' .  $r3['jefe_depto_adscrito'] . '">'; ?>
              <?php } ?>
              <div class="invalid-feedback">Se debe capturar el jefe de departamento que tendra asignado el EPRA.</div>
            </div>

            <div class="col-6">
              <label for="campo10" class="form-label">Coordinador de Auditores Juridicos u homólogo:</label>
              <?php while ($r3 = $resultado4->fetch_assoc()) { ?>
                <?php echo ' <input type="text" class="form-control" name="campo10" id="campo10" value="' .  $r3['coordinador_AJ'] . '">'; ?>
              <?php } ?>
              <div class="invalid-feedback">Se debe capturar el jefe de departamento que tendra asignado el EPRA.</div>
            </div>

            <div class="col-6 mb-3">
              <label for="campo6" class="form-label">Abogado responsable:</label>
              <?php echo ' <input type="text" class="form-control" name="campo6" id="campo6" value="' . $nombre . '" readonly>'; ?>
              <div class="invalid-feedback">Se debe capturar la dirección a la cuál esta asginado el EPRA.</div>
            </div>

            <div class="col-6">
              <label for="campo11" class="form-label">IPRA'S Recibidos:</label>
              <input type="number" min="0" max="100" class="form-control" id="campo11" name="campo11">
              <div class="invalid-feedback">Se debe capturar la cantidad de IPRA'S recibidos. </div>
            </div>

            <!-- <div class="col-6 mb-3">
              <label for="campo12" class="form-label">Fecha de Recepción del EPRA:</label>
              <input type="date" class="form-control" id="campo12" name="campo12">
              <div class="invalid-feedback">Se debe de Capturar la fecha de recepción del EPRA.</div>
            </div> -->
            <!-- <div class="col-6">
              <input type="hidden" class="form-control" name="campo13" id="campo13" value="<?php echo date("d/m/Y"); ?>">
            </div> -->

            <div class="col-6 mb-3">
              <label for="campo14" class="form-label">Direccion DGI:</label>
              <select class="form-select" id="campo14" name="campo14">
                <option value="" selected disabled>Selecciona la DGI A O B...</option>
                <option value="DGI A">DGI A</option>
                <option value="DGI B">DGI B</option>
              </select>
              <div class="invalid-feedback">Se debe capturar la dirección de DGI correspondiente.</div>
            </div>

            <div class="col-6">
              <label for="campo15" class="form-label">No. de Oficio DGI:</label>
              <input type="text" class="form-control" name="campo15" id="campo15">
              <div class="invalid-feedback">Se debe capturar el número de oficio de DGI correspondiente.</div>
            </div>

            <div class="col-6 mb-3">
              <label for="campo16" class="form-label">Fecha del Oficio DGI:</label>
              <input type="date" class="form-control" id="campo16" name="campo16">
              <div class="invalid-feedback">Se debe capturar la fecha del oficio de DGI correspondiente.</div>
            </div>

          </div>
          <button type="button" class="btn btn-primary" onclick="nextTab(2)">Siguiente</button>
        </form>
      </div>

      <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
        <form id="form3">
          <div class="row mt-4">
            <h3>DATOS DEL DICTAMEN TÉCNICO (DT):</h3>
          </div>
          <div class="row mt-2">
            <div class="col-6">
              <label for="campo17" class="form-label">Dictamen Técnico (DT):</label>
              <input type="text" class="form-control" id="campo17" name="campo17">
              <div class="invalid-feedback">Se debe capturar el número de dictamen tecnico.</div>
            </div>

            <div class="col-6 mb-3">
              <label for="campo18" class="form-label">Título de Auditoria:</label>
              <input type="text" class="form-control" id="campo18" name="campo18">
              <div class="invalid-feedback">Se debe capturar el título de la auditoria.</div>
            </div>

            <div class="col-6">
              <label for="campo19" class="form-label">Tipo de Auditoría:</label>
              <select class="form-select" id="campo19" name="campo19">
                <option value="" selected disabled>Selecciona el Tipo de Auditoría...</option>
                <?php while ($r5 = $result5->fetch_assoc()) { ?>
                  <option value="<?php echo $r5['tipo'] ?>"> <?php echo $r5['tipo'] ?> </option>
                <?php } ?>
              </select>
              <div class="invalid-feedback">Se debe capturar el tipo de auditoría.</div>
            </div>

            <div class="col-6 mb-3">
              <label for="campo20" class="form-label">Daño y/o perjuicio:</label>
              <select class="form-select" id="campo20" name="campo20">
                <option value="" selected disabled> Daño y/o Perjuicio... </option>
                <option value="Perjuicio"> Perjuicio </option>
                <option value="Daño"> Daño </option>
                <option value="No Precisa"> No Precisa </option>
                <option value="Daño y/o Perjucio"> Daño y/o Perjucio </option>
              </select>
              <div class="invalid-feedback">Se debe capturar el tipo de daño y/o perjuicio.</div>
            </div>

            <!-- <div class="col-6 mb-5">
              <label for="campo21" class="form-label">Daño y/o Perjuicio a:</label>
              <select class="form-select" id="campo21" name="campo21">
                <option value="" selected disabled> Daño y/o Perjuicio a... </option>
                <option value="Hacienda Pública Federal"> Hacienda Pública Federal </option>
                <option value="Hacienda Pública Local"> Hacienda Pública Local </option>
                <option value="Hacienda Pública Municipal"> Hacienda Pública Municipal </option>
                <option value="Patrimonio de Entes Públicos"> Patrimonio de Entes Públicos </option>
              </select>
              <div class="invalid-feedback">Se debe capturar a quien fue el daño y/o perjuicio.</div>
            </div> -->

          </div>
          <button type="button" class="btn btn-primary" onclick="nextTab(3)">Siguiente</button>
        </form>
      </div>

      <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
        <form id="form4">
          <div class="row mt-4">
            <h3>DATOS DEL IPRA Y EPRA:</h3>
          </div>
          <div class="row mt-2">
            <div class="col-6">
              <label for="campo22" class="form-label">No. de tomos del EPRA:</label>
              <input type="number" min="0" max="150" class="form-control" id="campo22" name="campo22">
              <div class="invalid-feedback">Se debe capturar el número de Tomos del EPRA.</div>
            </div>

            <div class="col-6 mb-3">
              <label for="campo23" class="form-label">No. de tomos de copias de traslado:</label>
              <input type="number" min="0" max="150" class="form-control" id="campo23" name="campo23">
              <div class="invalid-feedback">Se debe capturar el número de copias de traslado.</div>
            </div>

            <div class="col-6 mb-3 text-center">
              <label for="campo23" class="form-label">No. Total de Tomos de copias de traslado:</label>
              <input type="number" min="0" max="150" class="form-control" id="total" name="campo23">
              <div class="invalid-feedback">Se debe capturar el número tótal de tomos de copias de traslado.</div>
            </div>
          </div>

          <button type="button" class="btn btn-primary" onclick="nextTab(4)">Siguiente</button>
        </form>
      </div>

      <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
        <form id="form5">
          <div class="row mt-4">
            <h3>REGISTRO DE PRESUNTOS:</h3>
          </div>
          <div class="row mt-4">
            <div class="col-6">
              <label for="campo24" class="form-label">No. de Presuntos:</label>
              <input type="number" min="0" max="80" class="form-control" id="campo24" name="campo24">
              <div class="invalid-feedback">Se debe capturar el número de presuntos.</div>
            </div>
            <div class="p-4 col-6">
              <label for="altapresunto" class="form-label">Registrar Presuntos:</label>
              <button type="button" id="altapresunto" class="btn btn-light" disabled onclick="enviarAccionModal()"> <img src="../../images/agregar.png" alt="Icono" class="" data-bs-toggle="modal" data-bs-target="#formModal"> </button>
            </div>
          </div>
          <button type="button" class="btn btn-primary" onclick="enviarFormulario()">Enviar</button>
        </form>
      </div>
      <?php include '../../presuntos/Alta_Presuntos/alta_presunto.php'; ?>
    </div>


    <script src="../../css/bootstrap_5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../js/funciones.js"></script>
    <!--FUNCIÓN DE LAS PESTAÑAS Y LOS VALIDADORES-->
    <script src="../../css/bootstrap_5.3.3/js/validadoresAltaEpra.js"></script>
    <!-- <script src="../pruebas/autocompletar.js"></script> -->

    <script>
      //ENVIA EL NUMERO DE ACCIÓN AL MODAL DE ALTA DE PRESUNTOS
      function enviarAccionModal() {
        var text = document.getElementById('campo1').value;
        document.getElementById('modalText').innerText = text;
        // $('#textModal').modal('show');
      }
    </script>
    <div id="resultado" class="mt-3"></div>

</body>

</html>