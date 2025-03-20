<?php
require_once("../includes/conexion.php");
require_once('../includes/funciones.php');
$id = $_GET['id']; //saca el registro del Registro cuando es igual que el ID
$sql =  "SELECT * FROM oficios WHERE consecutivo = $id";
$resultado = $conexion->query($sql);

$sql2 = "SELECT * FROM usuarios ORDER BY nombre ASC";
$resultado2 = $conexion->query($sql2);
?>

<!DOCTYPE html>
<html lang="es">

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
        <h1>EDITAR OFICIO DGSUB <a href="../oficios/Oficios.php" class="btn btn-dark">Regresar</a></h1>
      </div>
    </div>
    <form action="" method="POST">
      <div class="row mt-5">
        <?php include "actualiza_oficio.php";
        while ($r = $resultado->fetch_assoc()) { ?>
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
          <div class="col-6">
            <label for="folio" class="form-label">Oficio:</label>
            <input type="text" class="form-control" name="folio" id="folio" value="<?php echo ivalorSeguro2($r['folio']); ?>">
          </div>

          <div class="col-6 mb-3">
            <label for="procedimiento" class="form-label">Procedimiento:</label>
            <input type="text" class="form-control" name="procedimiento" id="procedimiento" value="<?php echo ivalorSeguro2($r['procedimiento']); ?>">
          </div>

          <div class=" col-6">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="text" class="form-control" name="fecha" id="fecha" value="<?php echo ivalorSeguro2($r['fecha_oficio']); ?>">
          </div>

          <div class="col-6 mb-3">
            <label for="destinatario" class="form-label">Destinatario:</label>
            <input type="text" class="form-control" name="destinatario" id="destinatario" value="<?php echo ivalorSeguro2($r['destinatario']); ?>">
          </div>

          <div class="col-6">
            <label for="cargo" class="form-label">Cargo Destinatario:</label>
            <input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo ivalorSeguro2($r['cargo_destinatario']); ?>">
          </div>

          <div class="col-6 mb-3">
            <label for="dependencia" class="form-label">Dependencia:</label>
            <input type="text" class="form-control" name="dependencia" id="dependencia" value="<?php echo ivalorSeguro2($r['dependencia']); ?>">
          </div>

          <div class="col-6 mb-3">
            <label for="observaciones" class="form-label">Observaciones:</label>
            <input type="text" class="form-control" name="observaciones" id="observaciones" value="<?php echo ivalorSeguro2($r['observaciones']); ?>">
          </div>

          <div class="mb-3">
             <label for="asunto" class="form-label">Asunto:</label>
              <textarea class="form-control" id="asunto" name="asunto" rows="3" value="<?php echo ivalorSeguro2($r['asunto']); ?>"><?php echo ivalorSeguro2($r['asunto']); ?></textarea>
          </div>

          <div class="col-6 mb-3">
            <label for="solicitante" class="form-label">Abogado Solicitante:</label>
            <select class="form-select" name="solicitante" id="solicitante">
              <?php echo '<option value="' . $r['abogado_solicitante'] . '"selected>' . $r['abogado_solicitante'] . '</option>'; ?>
              <?php while ($r2 = $resultado2->fetch_assoc()) { ?>
                <option value="<?php echo $r2['nombre']; ?>"><?php echo $r2['nombre'].' - '.$r2['nivel']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="nivel" class="form-label">Nivel:</label>
            <select class="form-select" name="nivel" id="nivel">
              <?php echo '<option value="' . $r['nivel'] . '"selected>' . $r['nivel'] . '</option>'; ?>
              <option value="A.1">A.1</option>
              <option value="A.2">A.2</option>
              <option value="ST">ST</option>
              <option value="C">C</option>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="firma" class="form-label">Firma Oficio:</label>
            <select class="form-select" name="firma" id="firma">
              <?php echo '<option value="' . $r['firma_oficio'] . '"selected>' . $r['firma_oficio'] . '</option>'; ?>
              <option value="DIANA TERESA SEDANO TOLEDO">DIANA TERESA SEDANO TOLEDO - A</option>
              <option value="EUMIR FERNANDO ZALDÍVAR JIMÉNEZ">EUMIR FERNANDO ZALDÍVAR JIMÉNEZ - ST</option>
              <option value="ISAID RODRÍGUEZ ESQUIVEL">ISAID RODRÍGUEZ ESQUIVEL - A.2</option>
              <option value="ALFONSO JAVIER ARREDONDO HUERTA">ALFONSO JAVIER ARREDONDO HUERTA - A.1</option>
              <option value="GUSTAVO RIOS CASTRO">GUSTAVO RIOS CASTRO - C</option>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="status" class="form-label">Estatus del Oficio:</label>
            <select class="form-select" name="status" id="status">
              <?php echo '<option value="' . $r['status'] . '"selected>' . $r['status'] . '</option>'; ?>
              <option value="0">0 - Cancelado</option>
              <option value="1">1 - Pendiente</option>
              <option value="2">2 - Notificado</option>
            </select>
          </div>

        <?php
          $conexion->close();
        } ?>

        <div class="col-12 mt-4">
          <button type="submit" class="btn btn-primary" name="btnactualizar" value="ok">Modificar Oficio</button>
        </div>

      </div>
    </form>
  </div>

</body>

</html>