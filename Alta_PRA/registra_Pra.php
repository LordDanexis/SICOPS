<?php
//****************************** CONEXIÓN A LAS BASES DE DATOS **********************************************
require_once('../includes/conexion.php');
$sql =  "SELECT * FROM pra";
$result = $conexion->query($sql);

$sql2 = "SELECT * FROM usuarios WHERE Status != 0 ORDER BY nombre";
$result2 = $conexion->query($sql2);

$sql3 = "SELECT * FROM usuarios WHERE Status != 0 ORDER BY nombre";
$result3 = $conexion->query($sql3);

$sql4 = "SELECT * FROM faltas_admin";
$result4 = $conexion->query($sql4);
//****************************** CONEXIÓN A LAS BASES DE DATOS **********************************************
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alta de PRA</title>
  <link rel="stylesheet" href="../css/bootstrap_5.3.3/css/bootstrap.min.css">
</head>

<body>
  <?php include '../encabezados/encabezadoModulos.php'; ?>
  <div class="container">
    <div class="row mt-3">
      <div class="col">
        <h1>Alta de Procedimiento de Responsabilidad Administrativa (PRA) </h1>
        <a href="../index.php" class="btn btn-dark">Regresar</a>
      </div>
      <div class="row mt-4">
        <h2>VALIDACIÓN DE DATOS:</h2>
      </div>
    </div>
    <form action="procesar_formulario.php" method="POST">
      <div class="row mt-2">
        <div class="col-6">
          <label for="num_accion" class="form-label">Clave de Acción:</label>
          <input type="text" class="form-control" name="num_accion" id="num_accion">
        </div>
        <div class="col-6 mb-3">
          <label for="cp" class="form-label">Cuenta Pública (CP):</label>
          <input type="text" class="form-control" name="cp" id="cp">
        </div>
        <div class="col-6">
          <label for="auditoria" class="form-label">No. Auditoria:</label>
          <input type="text" class="form-control" name="auditoria" id="auditoria">
        </div>
        <div class="col-6 mb-3">
          <label for="pra" class="form-label">EPRA:</label>
          <input type="text" class="form-control" name="pra" id="pra">
        </div>
        <div class="col-6">
          <label for="entidad" class="form-label">Entidad Fiscalizada:</label>
          <input type="text" class="form-control" name="entidad" id="entidad">
        </div>
        <div class="mb-3">
          <label for="infraccion" class="form-label">Infracción Imputada en el IPRA:</label>
          <textarea class="form-control" id="infraccion" name="infraccion" rows="5" value=""> </textarea>
        </div>

        <h2>DATOS DE RECEPCIÓN Y ASIGNACIÓN:</h2>

        <div class="col-6">
          <label for="fechaRecep" class="form-label">Fecha de Recepción del EPRA:</label>
          <input type="date" class="form-control" name="fechaRecep" id="fechaRecep">
        </div>
        <div class="col-6 mb-3">
          <label for="fechaAsig" class="form-label">Fecha de Asignación del EPRA:</label>
          <input type="date" class="form-control" name="fechaAsig" id="fechaAsig">
        </div>
        <div class="col-6">
          <label for="oficioDGI" class="form-label">No. de Oficio DGI:</label>
          <input type="text" class="form-control" name="oficioDGI" id="oficioDGI">
        </div>
        <div class="col-6 mb-3">
          <label for="fechOfiDGI" class="form-label">Fecha del Oficio DGI:</label>
          <input type="text" class="form-control" name="fechOfiDGI" id="fechOfiDGI">
        </div>

        <div class="col-6">
          <label for="direccion" class="form-label">Direccion:</label>
          <select class="form-select" id="direccion" oninput="seleccionDireccion()">
            <option value="" selected disabled>Selecciona la dirección del PRA...</option>
            <option value="A.1">A.1</option>
            <option value="A.2">A.2</option>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="director" class="form-label">Director:</label>
          <select class="form-select" id="director">
            <option value="" selected disabled>Selecciona un Director de Área...</option>
          </select>
        </div>

        <div class="col-6">
          <label for="subdirector" class="form-label">Subdirector:</label>
          <select class="form-select" id="subdirector">
            <option value="" selected disabled>Selecciona un Subdirector de Área...</option>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="jefeDepto" class="form-label">Jefe de Departamento:</label>
          <select class="form-select" id="jefeDepto">
            <option value="" selected disabled>Selecciona un Jefe de Departamento...</option>
          </select>
        </div>

        <script type="text/javascript" src="../js/funciones.js"></script>

        <div class="col-6">
          <label for="solicitante" class="form-label">Abogado Responsable:</label>
          <select class="form-select" name="solicitante" id="solicitante">
            <option value="" selected disabled>Selecciona el Abogado Responsable...</option>
            <?php while ($r2 = $result2->fetch_assoc()) { ?>
              <option value=""><?php echo $r2['nombre'] . ' - ' . $r2['nivel']; ?> </option>
            <?php } ?>
          </select>
        </div>

        <div class="col-6 mb-5">
          <label for="solicitante2" class="form-label">Abogado Responsable 2:</label>
          <select class="form-select" name="solicitante2" id="solicitante2">
            <option value="" selected disabled>Selecciona el Segundo Abogado Responsable...</option>
            <?php while ($r3 = $result3->fetch_assoc()) { ?>
              <option value=""><?php echo $r3['nombre'] . ' - ' . $r3['nivel']; ?> </option>
            <?php } ?>
          </select>
        </div>


        <h2>DATOS DEL DICTAMEN TÉCNICO (DT):</h2>

        <div class="col-6">
          <label for="dt" class="form-label">Dictamen Técnico (DT):</label>
          <input type="text" class="form-control" name="dt" id="dt">
        </div>

        <div class="col-6 mb-3">
          <label for="tituloAudi" class="form-label">Título de Auditoria:</label>
          <input type="text" class="form-control" name="tituloAudi" id="tituloAudi">
        </div>

        <div class="col-6">
          <label for="tipoAudi" class="form-label">Tipo de Auditoría:</label>
          <input type="text" class="form-control" name="tipoAudi" id="tipoAudi">
        </div>

        <div class="col-6 mb-3">
          <label for="daño" class="form-label">Daño y/o perjuicio:</label>
          <select class="form-select" name="daño" id="daño">
            <option value="" selected disabled> Daño y/o Perjuicio... </option>
            <option value="Perjuicio"> Perjuicio </option>
            <option value="Daño"> Daño </option>
            <option value="No Precisa"> No Precisa </option>
            <option value="Daño y/o Perjucio"> Daño y/o Perjucio </option>
          </select>
        </div>

        <div class="col-6 mb-5">
          <label for="dañoa" class="form-label">Daño y/o Perjuicio a:</label>
          <select class="form-select" name="dañoa" id="dañoa">
            <option value="" selected disabled> Daño y/o Perjuicio a... </option>
            <option value="Hacienda Pública Federal"> Hacienda Pública Federal </option>
            <option value="Hacienda Pública Local"> Hacienda Pública Local </option>
            <option value="Hacienda Pública Municipal"> Hacienda Pública Municipal </option>
            <option value="Patrimonio de Entes Públicos"> Patrimonio de Entes Públicos </option>
          </select>
        </div>


        <h2>DATOS DEL IPRA Y EPRA:</h2>

        <div class="col-6">
          <label for="noPresuntos" class="form-label">No. de Presuntos:</label>
          <input type="text" class="form-control" name="noPresuntos" id="noPresuntos">
        </div>

        <div class="col-6">
          <label for="presuntos" class="form-label">Presuntos:</label>
          <button type="button" class="btn btn-light"> <img src="../images/agregar.png" alt="Icono" class="" data-bs-toggle="modal" data-bs-target="#formModal"> </button>
        </div>

        <div class="col-6">
          <label for="calidad" class="form-label">Calidad de los Presuntos:</label>
          <select class="form-select" name="calidad" id="calidad">
            <option value="" selected disabled> Calidad de los Presuntos... </option>
            <option value="Particular Persona Física"> Particular Persona Física </option>
            <option value="Particular Persona Moral"> Particular Persona Moral </option>
            <option value="Servidor Público y Particular Persona Física"> Servidor Público y Particular Persona Física </option>
            <option value="Servidor Público y Particular Persona Moral"> Servidor Público y Particular Persona Moral </option>
            <option value="Servidor Público, Particular Persona Física y Particular Persona Moral"> Servidor Público, Particular Persona Física y Particular Persona Moral </option>
            <option value="Particular en Situación Especial"> Particular en Situación Especial </option>
            <option value="Receptor de Recursos Públicos"> Receptor de Recursos Públicos </option>
            <option value="N/A"> N/A </option>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="presuntos" class="form-label">Cargo de los Presuntos Responsables:</label>
          <input type="text" class="form-control" name="presuntos" id="presuntos">
        </div>

        <div class="col-6">
          <label for="montoGlob" class="form-label">Monto Global del EPRA:</label>
          <input type="text" class="form-control" name="montoGlob" id="montoGlob">
        </div>

        <div class="col-6 mb-3">
          <label for="montoPres" class="form-label">Desglose del Monto por Presunto:</label>
          <input type="text" class="form-control" name="montoPres" id="montoPres">
        </div>


        <div class="col-6">
          <label for="calificacion" class="form-label">Calificación de la Falta:</label>
          <select class="form-select" name="calificacion" id="calificacion">
            <option value="" selected disabled> Calificación de la Falta... </option>
            <option value="Falta Grave"> Falta Grave </option>
            <option value="Falta de Particular Vinculado con Falta Administrativa Grave"> Falta de Particular Vinculado con Falta Administrativa Grave </option>
            <option value="Falta de Particular en Situación Especial"> Falta de Particular en Situación Especial </option>
            <option value="Faltas Graves de Servidores Públicos y Faltas de Particulares Vinculados con Faltas Administrativas Graves"> Faltas Graves de Servidores Públicos y Faltas de Particulares Vinculados con Faltas Administrativas Graves </option>
            <option value="Faltas Graves de Servidores Públicos y Faltas de Particulares en Situación Especial"> Faltas Graves de Servidores Públicos y Faltas de Particulares en Situación Especial </option>
            <option value="Faltas Graves de Servidores Públicos, Faltas de Particulares Vinculados con Faltas Administrativas Graves y Faltas de Particulares en Situación Especial"> Faltas Graves de Servidores Públicos, Faltas de Particulares Vinculados con Faltas Administrativas Graves y Faltas de Particulares en Situación Especial </option>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="faltaGrave" class="form-label">Tipo de falta Administrativa Grave:</label>
          <select class="form-select" name="faltaGrave" id="faltaGrave">
            <option value="" selected disabled>Selecciona el Tipo de Falta Administrativa Grave...</option>
            <?php while ($r4 = $result4->fetch_assoc()) { ?>
              <option value=""><?php echo $r4['falta']; ?> </option>
            <?php } ?>
          </select>
        </div>

        <div class="col-6">
          <label for="faltEsp" class="form-label">Modalidades (Faltas de Particulares en Situación Especial):</label>
          <select class="form-select" name="faltEsp" id="faltEsp">
            <option value="" selected disabled> Falta de Particulares en Situación Especial... </option>
            <option value="Exigir Beneficios"> Exigir Beneficios </option>
            <option value="Solicitar Beneficios"> Solicitar Beneficios </option>
            <option value="Aceptar Beneficios"> Aceptar Beneficios </option>
            <option value="Recibir Beneficios"> Recibir Beneficios </option>
            <option value="Pretender Beneficios"> Pretender Beneficios </option>
            <option value="No Aplica para este Asunto"> No Aplica para este Asunto </option>

          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="periodoIrre" class="form-label">Fecha/Periodo de Irregularidad:</label>
          <input type="date" class="form-control" name="periodoIrre" id="periodoIrre">
        </div>

        <div class="col-6">
          <label for="denuncia" class="form-label">Denuncia:</label>
          <select class="form-select" name="denuncia" id="denuncia">
            <option value="" selected disabled>Denuncia...</option>
            <option value="Con Denuncia"> Con Denuncia </option>
            <option value="No Existe Denuncia"> No Existe Denuncia </option>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="presuntos" class="form-label">No. de Tomos de EPRA:</label>
          <input type="text" class="form-control" name="presuntos" id="presuntos">
        </div>

        <div class="col-6">
          <label for="presuntos" class="form-label">Tomas de Copias de Traslado:</label>
          <input type="text" class="form-control" name="presuntos" id="presuntos">
        </div>

        <div class="col-6 mb-3">
          <label for="autoriAnt" class="form-label">Autorizados DGI (Anteriores):</label>
          <select class="form-select" name="autoriAnt" id="autoriAnt">
            <option value="" selected disabled>Selecciona la lista de Autorizados DGI Anteriores...</option>
          </select>
        </div>

        <div class="col-6">
          <label for="autoriDGI" class="form-label">Autorizados DGI (modificable):</label>
          <input type="text" class="form-control" name="autoriDGI" id="autoriDGI">
        </div>

        <!-- <div class="col-12 mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <input type="text" class="form-control" name="descripcion" id="descripcion">
        </div> -->

        <div class="col-12 mt-4">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
    <?php include '../presuntos/Alta_Presuntos/alta_presunto.php'; ?>
  </div>
  <script src="../css/bootstrap_5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>