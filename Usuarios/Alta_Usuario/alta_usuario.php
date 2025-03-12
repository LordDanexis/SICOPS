<?php
require_once("../../includes/conexion.php");
$query =  "SELECT * FROM usuarios";
$result = $conexion->query($query);
$query =  "SELECT * FROM puestos";
$result2 = $conexion->query($query);
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
  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <h1>Alta de Usuarios DGSUB<a href="../../index.php" class="btn btn-dark">Regresar</a></h1>
      </div>
    </div>
    <form action="" method="POST">
      <div class="row mt-5">
        <?php include "inserta_usuario.php"; ?>
        <div class="col-6">
          <label for="nombre" class="form-label">Nombre:</label>
          <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="col-6">
          <label for="curp" class="form-label">Curp:</label>
          <input type="text" class="form-control" name="curp" id="curp">
        </div>
        <div class="col-6 mb-3">
          <label for="genero" class="form-label">Género:</label>
          <select class="form-select" name="genero" id="genero">
            <option value="" disabled selected>Que Género es el Usuario...</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="indefinido">Indefinido</option>
          </select>
        </div>
        <div class="col-6">
          <label for="usuario" class="form-label">Usuario:</label>
          <input type="text" class="form-control" name="usuario" id="usuario">
        </div>
        <div class="col-6">
          <label for="contraseña" class="form-label">Contraseña:</label>
          <input type="text" class="form-control" name="contraseña" id="contraseña">
        </div>
        <div class="col-6">
          <label for="contrato" class="form-label">Contrato:</label>
          <input type="text" class="form-control" name="contrato" id="contrato">
        </div>

        <div class="col-6 mb-3">
          <label for="nivel" class="form-label">Nivel:</label>
          <select class="form-select" name="nivel" id="nivel">
            <option value="" disabled selected>A que Área esta Adscrito el Usuario...</option>
            <option value="A.1">A.1</option>
            <option value="A.2">A.2</option>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="direccion" class="form-label">Dirección:</label>
          <select class="form-select" name="direccion" id="direccion">
            <option value="" disabled selected>Dirección del Usuario...</option>
            <option value="AP">Administrador Principal</option>
            <option value="DG">Dirección General</option>
            <option value="A">A</option>
          </select>
        </div>

        <div class="col-6">
          <label for="noEmpleado" class="form-label">No. de Empleado:</label>
          <input type="text" class="form-control" name="noEmpleado" id="noEmpleado">
        </div>

        <div class="col-6 mb-3">
          <label for="tipoEmple" class="form-label">Tipo de Empleo:</label>
          <select class="form-select" name="tipoEmple" id="tipoEmple">
            <option value="" disabled selected>Tipo de Empleo del Usuario...</option>
            <option value="Estructura">Estructura</option>
            <option value="Honorarios">Honorarios</option>
          </select>
        </div>

        <div class="col-6 mb-3">
          <label for="puesto" class="form-label">Puesto:</label>
          <select class="form-select" name="puesto" id="puesto">
            <option value="" selected>Selecciona el Nivel del Usuario...</option>
            <?php
            while ($r = $result2->fetch_assoc()) {
            ?>
              <option value="<?php echo $r['id']; ?>"><?php echo $r['puesto']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-6">
          <label for="subAdscrito" class="form-label">Subdirector Adscrito:</label>
          <input type="text" class="form-control" name="subAdscrito" id="subAdscrito">
        </div>

        <div class="col-6">
          <label for="jefeAdscrito" class="form-label">Jefe de Departamento Adscrito:</label>
          <input type="text" class="form-control" name="jefeAdscrito" id="jefeAdscrito">
        </div>

        <div class="col-6 mb-3">
          <label for="status" class="form-label">Estatus del Usuario:</label>
          <select class="form-select" name="status" id="status">
            <option value="" disabled selected>Cuál es el Estatus del Usuario...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
          </select>
        </div>

        <div class="col-12">
          <button type="submit" name="btninsertar" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </form>
  </div>

</body>

</html>