<?php
//************************CONEXIÓN A LA BASE DE DATOS*****************************/
require_once("../../includes/conexion.php");

$query =  "SELECT * FROM puestos";
$result = $conexion->query($query);

$query2 =  "SELECT * FROM usuarios";
$resultado = $conexion->query($query2);
//************************CONEXIÓN A LA BASE DE DATOS*****************************/
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ALTA DE USUARIOS</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../../css/bootstrap_5.3.3/css/bootstrap.min.css">
</head>

<body>
  <?php include '../../encabezados/encabezadoUsuarios.php'; ?>
  <div class="container">

    <div class="row row-cols-2 text-center">
      <div class="col-6 mt-4">
        <h2>Alta de Usuarios DGSUB</h2>
      </div>
      <div class="col mt-4"><a href="../../index.php" class="btn btn-dark">Regresar</a></div>
    </div>


    <form class="needs-validation" method="POST" novalidate>
      <div class="row mt-5">
        <?php include "inserta_usuario.php"; ?>
        <div class="col-6">
          <label for="nombreU" class="form-label">Nombre:</label>
          <input type="text" class="form-control" name="nombreU" id="nombreU" required oninput="convertirMayusculas()">
          <div class="invalid-feedback"> Se debe de Capturar el Nombre Completo.</div>
        </div>

        <div class="col-6 mb-3">
          <label for="curp" class="form-label">Curp:</label>
          <input type="text" class="form-control" name="curp" id="curp" required>
          <div class="invalid-feedback"> Se debe de Capturar la Curp.</div>
        </div>

        <div class="col-6">
          <label for="genero" class="form-label">Género:</label>
          <select class="form-select" name="genero" id="genero" required>
            <option value="" disabled selected>Que Género es el Usuario...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Indefinido">Indefinido</option>
          </select>
          <div class="invalid-feedback"> Se debe de Capturar el Género.</div>
        </div>

        <div class="col-6 mb-3">
          <label for="usuario" class="form-label">Usuario:</label>
          <input type="text" class="form-control" name="usuario" id="usuario" required>
          <div class="invalid-feedback"> Se debe de Capturar el Usuario.</div>
        </div>
        <div class="col-6">
          <label for="contraseña" class="form-label">Contraseña:</label>
          <input type="text" class="form-control" name="contraseña" id="contraseña" required>
          <div class="invalid-feedback"> Se debe de Capturar la contraseña del Usuario.</div>
        </div>
        <div class="col-6 mb-3">
          <label for="contrato" class="form-label">Contrato:</label>
          <input type="text" class="form-control" name="contrato" id="contrato" required>
          <div class="invalid-feedback"> Se debe de Capturar el Número del Contrato.</div>
        </div>

        <div class="col-6">
          <label for="nivel" class="form-label">Nivel:</label>
          <select class="form-select" name="nivel" id="nivel" required>
            <option value="" disabled selected>A que área esta Adscrito el Usuario...</option>
            <option value="A.1">A.1</option>
            <option value="A.2">A.2</option>
            <option value="ST">ST</option>
            <option value="C">C</option>
          </select>
          <div class="invalid-feedback"> Se debe de Capturar el Área a la que va a Estár Ádscrita el Usuario.</div>
        </div>

        <div class="col-6 mb-3">
          <label for="direccion" class="form-label">Dirección:</label>
          <select class="form-select" name="direccion" id="direccion" required>
            <option value="" disabled selected>Dirección del Usuario...</option>
            <option value="AP">AP (Administrador Principal)</option>
            <option value="ST">ST (Secretaria Técnica)</option>
            <option value="DG">DG (Dirección General)</option>
            <option value="A">A (Todos los Abogados de la dirección A)</option>
            <option value="C">C (Dirección C por incorporarse)</option>
          </select>
          <div class="invalid-feedback"> Se debe de Capturar el Tipo de Dirección del Usuario.</div>
        </div>

        <div class="col-6">
          <label for="noEmpleado" class="form-label">No. de Empleado:</label>
          <input type="text" class="form-control" name="noEmpleado" id="noEmpleado" required>
        </div>

        <div class="col-6 mb-3">
          <label for="tipoEmple" class="form-label">Tipo de Empleo:</label>
          <select class="form-select" name="tipoEmple" id="tipoEmple" required>
            <option value="" disabled selected>Tipo de Empleo del Usuario...</option>
            <option value="Estructura">Estructura</option>
            <option value="Honorarios">Honorarios</option>
          </select>
        </div>

        <div class="col-6">
          <label for="puesto" class="form-label">Puesto:</label>
          <select class="form-select" name="puesto" id="puesto" required>
            <option value="" disabled selected>Selecciona el Puesto del Usuario...</option>
            <?php
            while ($r = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['puesto']; ?>"><?php echo $r['puesto']; ?></option>
            <?php } ?>
          </select>
        </div>

        <!-- <div class="col-6 mb-3">
          <label for="director" class="form-label">Director:</label>
          <input type="text" class="form-control" name="director" id="director">
        </div> -->

        <div class="col-6 mb-3">
          <label for="director" class="form-label">Direccion DGI:</label>
          <select class="form-select" id="director" name="director">
            <option value="" selected disabled>Selecciona la DGI A O B...</option>
            <option value="DGI A">DGI A</option>
            <option value="DGI B">DGI B</option>
          </select>
          <div class="invalid-feedback">Se debe capturar la dirección de DGI correspondiente.</div>
        </div>

        <div class="col-6">
          <label for="subAdscrito" class="form-label">Subdirector:</label>
          <input type="text" class="form-control" name="subAdscrito" id="subAdscrito">
        </div>

        <div class="col-6 mb-3">
          <label for="jefeAdscrito" class="form-label">Jefe de Departamento:</label>
          <input type="text" class="form-control" name="jefeAdscrito" id="jefeAdscrito">
        </div>

        <div class="col-6 mb-3">
          <label for="coordinador" class="form-label">Coordinador de Auditores Juridicos:</label>
          <input type="text" class="form-control" name="coordinador" id="coordinador">
        </div>

        <div class="col-6 mb-3">
          <label for="status" class="form-label">Estatus del Usuario:</label>
          <select class="form-select" name="status" id="status" required>
            <option value="" disabled selected>Cuál es el Estatus del Usuario...</option>
            <option value="0">0 - Inactivo</option>
            <option value="1">1 - Activo</option>
          </select>
          <div class="invalid-feedback">Se debe de llenar el Campo Status.</div>
        </div>
        <div class="col-12 mb-3 text-center">
          <button type="submit" class="btn btn-primary" name="btninsertar" value="ok">Guardar</button>
        </div>
      </div>
    </form>
  </div>

  <script src="../../css/bootstrap_5.3.3/js/bootstrap.bundle.min.js"></script>
  <script src="../../js/funciones.js"></script>
  <script src="../../css/bootstrap_5.3.3/js/validadores.js"></script>

</body>

</html>