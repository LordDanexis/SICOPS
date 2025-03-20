<?php
require_once('../includes/conexion.php');
$query =  "SELECT * FROM pra";
$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alta de PRA</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../css/bootstrap_5.3.3/css/bootstrap.min.css">
  <script href="../css/bootstrap_5.3.3/jss/bootstrap.bundle.min.js"> </script>
  <script type="text/javascript" src="../js/funciones.js"></script>
</head>

<body>

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
    <form action="" method="POST">
      <div class="row mt-2">
        <div class="col-6">
          <label for="accion" class="form-label">Clave de Acción:</label>
          <input type="text" class="form-control" name="accion" id="accion">
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
          <label for="epra" class="form-label">EPRA:</label>
          <input type="text" class="form-control" name="epra" id="epra">
        </div>
        <div class="col-6">
          <label for="entidad" class="form-label">Entidad Fiscalizada:</label>
          <input type="text" class="form-control" name="entidad" id="entidad">
        </div>
        <div class="col-6 mb-5">
          <label for="infraccion" class="form-label">Infracción Imputada en el IPRA:</label>
          <input type="text" class="form-control" name="infraccion" id="infraccion">
        </div>

        <h2>DATOS DE RECEPCIÓN Y ASIGNACIÓN:</h2>

        <div class="col-6">
          <label for="fechaRecep" class="form-label">Fecha de Recepción del EPRA:</label>
          <input type="text" class="form-control" name="fechaRecep" id="fechaRecep">
        </div>
        <div class="col-6 mb-3">
          <label for="fechaAsig" class="form-label">Fecha de Asignación del EPRA:</label>
          <input type="text" class="form-control" name="fechaAsig" id="fechaAsig">
        </div>
        <div class="col-6 mb-3">
          <label for="oficioDGI" class="form-label">No. de Oficio DGI:</label>
          <input type="text" class="form-control" name="oficioDGI" id="oficioDGI">
        </div>
        <div class="col-6">
          <label for="fechOfiDGI" class="form-label">Fecha del Oficio DGI:</label>
          <input type="text" class="form-control" name="fechOfiDGI" id="fechOfiDGI">
        </div>

        <div class="col-6">
          <label for="direccion" class="form-label">Dirección:</label>
          <select class="form-control" id="direccion" onchange="completarCampos()">
            <option value="" disabled selected>Escoge la Dirección...</option>
            <option value="A.1">A.1</option>
            <option value="A.2">A.2</option>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="director" class="form-label">Director de Área:</label>
          <input type="text" class="form-control" name="director" id="director">
        </div>

        <div class="col-6">
          <label for="categoria" class="form-label">Subdirector Responsable:</label>
          <select class="form-select" name="categoria" id="categoria">
            <option value="" disabled selected>Subdirector Responsable...</option>
            <option value="Mtra. Ivonne Celis Morales">Mtra. Ivonne Celis Morales</option>
            <option value="Lic. Daniela Armas Rendón">Lic. Daniela Armas Rendón</option>
            <option value="Mtro. Jorge Jiménez Santana">Mtro. Jorge Jiménez Santana</option>
            <option value="Lic. Jazmín Alejandra Arriaga Hernández">Lic. Jazmín Alejandra Arriaga Hernández</option>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="categoria" class="form-label">Jefe de Departamento:</label>
          <select class="form-select" name="categoria" id="categoria">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-6">
          <label for="categoria" class="form-label">Abogado Responsable:</label>
          <select class="form-select" name="categoria" id="categoria">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-6 mb-5">
          <label for="categoria" class="form-label">Responsable 2:</label>
          <select class="form-select" name="categoria" id="categoria">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
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
          <label for="categoria" class="form-label">Daño y/o perjuicio:</label>
          <select class="form-select" name="categoria" id="categoria">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-6 mb-5">
          <label for="categoria" class="form-label">Daño /Perjuicio a:</label>
          <select class="form-select" name="categoria" id="categoria">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>

        <h2>DATOS DEL IPRA Y EPRA:</h2>

        <div class="col-6">
          <label for="noPresuntos" class="form-label">No. de Presuntos:</label>
          <input type="text" class="form-control" name="noPresuntos" id="noPresuntos">
        </div>

        <div class="col-6 mb-3">
          <label for="presuntos" class="form-label">Presuntos:</label>
          <input type="text" class="form-control" name="presuntos" id="presuntos">
        </div>

        <div class="col-6">
          <label for="categoria" class="form-label">Calidad de los Presuntos:</label>
          <select class="form-select" name="categoria" id="categoria">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
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
          <label for="caliFalta" class="form-label">Calificación de la Falta:</label>
          <select class="form-select" name="caliFalta" id="caliFalta">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="faltaGrave" class="form-label">Tipo de falta Administrativa Grave:</label>
          <select class="form-select" name="faltaGrave" id="faltaGrave">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-6">
          <label for="faltEsp" class="form-label">Modalidades (Faltas de Particulares en Situación Especial):</label>
          <select class="form-select" name="faltEsp" id="faltEsp">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="periodoIrre" class="form-label">Fecha/Periodo de Irregularidad:</label>
          <input type="text" class="form-control" name="periodoIrre" id="periodoIrre">
        </div>

        <div class="col-6">
          <label for="denuncia" class="form-label">Denuncia:</label>
          <select class="form-select" name="denuncia" id="denuncia">
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
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
            <option value="0" selected>Selecciona tu opción</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
            <?php } ?>
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
        <bd>
          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </div>
    </form>
  </div>

</body>

</html>