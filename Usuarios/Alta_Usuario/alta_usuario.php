<?php
require_once("../../includes/conexion.php");
$query =  "SELECT * FROM usuarios";
$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="en">

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
        <div class="col-6">
          <label for="cantidad" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="cantidad" id="cantidad">
        </div>
        <div class="col-6">
          <label for="curp" class="form-label">Curp</label>
          <input type="text" class="form-control" name="curp" id="curp">
        </div>
        <div class="col-6">
          <label for="genero" class="form-label">Género</label>
          <select class="form-select" name="genero" id="genero">
            <option value="0" selected>Selecciona tu opción</option>
            <option value="masculino" selected>Masculino</option>
            <option value="femenino" selected>Femenino</option>
          </select>
        </div>
        <div class="col-6">
          <label for="usuario" class="form-label">Usuario</label>
          <input type="text" class="form-control" name="usuario" id="usuario">
        </div>
        <div class="col-6">
          <label for="contraseña" class="form-label">Contraseña</label>
          <input type="text" class="form-control" name="contraseña" id="contraseña">
        </div>
        <div class="col-6">
          <label for="contrato" class="form-label">Contrato</label>
          <input type="text" class="form-control" name="contrato" id="contrato">
        </div>
        <div class="col-6">
          <label for="nivel" class="form-label">Nivel</label>
          <input type="text" class="form-control" name="nivel" id="nivel">
        </div>
        <div class="col-6">
          <label for="direccion" class="form-label">Direccion</label>
          <input type="text" class="form-control" name="direccion" id="direccion">
        </div>

        <div class="col-6">
          <label for="nempleado" class="form-label">No. de Empleado</label>
          <input type="text" class="form-control" name="nempleado" id="nempleado">
        </div>

        <div class="col-6">
          <label for="genero" class="form-label">Género</label>
          <select class="form-select" name="genero" id="genero">
            <option value="0" selected>Selecciona tu opción</option>
            <option value="masculino" selected>Masculino</option>
            <option value="femenino" selected>Femenino</option>
          </select>
        </div>

        <div class="col-6">
          <label for="direccion" class="form-label">Direccion</label>
          <input type="text" class="form-control" name="direccion" id="direccion">
        </div>

        <div class="col-6 mb-3">
          <label for="categoria" class="form-label">Categoría</label>
          <select class="form-select" name="categoria" id="categoria">
            <option value="0" selected>Selecciona tu opción</option>
            <?php 
            while ($row = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-12 mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <input type="text" class="form-control" name="descripcion" id="descripcion">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </form>
  </div>

</body>

</html>