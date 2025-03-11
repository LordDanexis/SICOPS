<?php
require_once('conexion.php');
require_once('../includes/funciones.php');
$id = $_GET['id'];
//saca el registro del Registro cuando es igual que el ID
$sql =  "SELECT * FROM oficios WHERE consecutivo = $id";
$resultado = $conexion->query($sql);
//$consulta = ("SELECT * FROM oficios WHERE consecutivo = $id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDITAR REGISTRO</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../css/bootstrap_5.3.3/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <h1>Editar Oficio DGSUB <a href="../busquedaO/OficiosB.php" class="btn btn-dark">Regresar</a></h1>

      </div>
    </div>
    <form action="" method="POST">
      <div class="row mt-5">

        <?php
        include "actualiza_registro.php";
        while ($r = $resultado->fetch_assoc()) { ?>
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
          <div class="col-6">
            <label for="folio" class="form-label">Oficio:</label>
            <input type="text" class="form-control" name="folio" id="folio" value="<?php echo ivalorSeguro2($r['folio']); ?>">
          </div>

          <div class="col-6">
            <label for="procedimiento" class="form-label">Procedimiento:</label>
            <input type="text" class="form-control" name="procedimiento" id="procedimiento" value="<?php echo ivalorSeguro2($r['procedimiento']); ?>">
          </div>

          <div class=" col-6">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="text" class="form-control" name="fecha" id="fecha" value="<?php echo ivalorSeguro2($r['fecha_oficio']); ?>">
          </div>

          <div class="col-6">
            <label for="destinatario" class="form-label">Destinatario:</label>
            <input type="text" class="form-control" name="destinatario" id="destinatario" value="<?php echo ivalorSeguro2($r['destinatario']); ?>">
          </div>

          <div class="col-6">
            <label for="cargo" class="form-label">Cargo Destinatario:</label>
            <input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo ivalorSeguro2($r['cargo_destinatario']); ?>">
          </div>

          <div class="col-6">
            <label for="dependencia" class="form-label">Dependencia:</label>
            <input type="text" class="form-control" name="dependencia" id="dependencia" value="<?php echo ivalorSeguro2($r['dependencia']); ?>">
          </div>

          <div class="col-6">
            <label for="nivel" class="form-label">Nivel:</label>
            <input type="text" class="form-control" name="nivel" id="nivel" value="<?php echo ivalorSeguro2($r['nivel']); ?>">
          </div>

          <div class="col-6">
            <label for="observaciones" class="form-label">Observaciones:</label>
            <input type="text" class="form-control" name="observaciones" id="observaciones" value="<?php echo ivalorSeguro2($r['observaciones']); ?>">
          </div>

          <div class="col-12 mb-3">
            <label for="asunto" class="form-label">Asunto:</label>
            <input type="text" class="form-control" name="asunto" id="asunto" value="<?php echo ivalorSeguro2($r['asunto']); ?>">
          </div>

          <div class="col-6">
            <label for="solicitante" class="form-label">Abogado solicitante:</label>
            <input type="text" class="form-control" name="solicitante" id="solicitante" value="<?php echo ivalorSeguro2($r['abogado_solicitante']); ?>">
          </div>

          <div class="col-6">
            <label for="firma" class="form-label">Firma Oficio:</label>
            <input type="text" class="form-control" name="firma" id="firma" value="<?php echo ivalorSeguro2($r['firma_oficio']); ?>">
          </div>

          <div class="col-6 mb-3">
            <label for="status" class="form-label">Estatus del Oficio:</label>
            <select class="form-select" name="status" id="status">
              <option value="" disabled selected>Cuál es el Status del Oficio:</option>
              <option value="0">Cancelado</option>
              <option value="1">Pendiente</option>
              <option value="2">Notificado</option>
            </select>
          </div>

        <?php
          $conexion->close();
        } ?>

        <div class="col-12 mt-4">

          <!-- <a href="../busquedaO/actualiza_registro.php" class="btn btn-success">Modificar Oficio</a></h1> -->
          <button type="submit" class="btn btn-success" name="btnactualizar" value="ok">Modificar Oficio</button>
        </div>

      </div>
    </form>
  </div>

</body>

</html>