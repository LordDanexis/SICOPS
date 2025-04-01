<?php
require_once('../../includes/conexion.php');
$id = $_GET['id']; //saca el registro del Registro cuando es igual que el ID
$query =  "SELECT * FROM usuarios WHERE id = $id";
$resultado = $conexion->query($query);

$query2 =  "SELECT * FROM puestos ORDER by id";
$resultado2 = $conexion->query($query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDITA USUARIO</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../../css/bootstrap_5.3.3/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../../encabezado/encabezado.php" type="text/css" media="screen" title="default" /> -->
  <script type="text/javascript" src="../../js/funciones.js"></script>
</head>

<body>
  ?>
  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <h1>EDITAR USUARIO DGSUB <a href="../Lista_Usuarios/usuarios.php" class="btn btn-dark">Regresar</a></h1>
      </div>
    </div>
    <form action="" method="POST">
      <div class="row mt-5">
        <?php include "actualiza_usuario.php";
        while ($r = $resultado->fetch_assoc()) { ?>
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
          <div class="col-6">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $r['nombre']; ?>">
          </div>

          <div class="col-6 mb-3">
            <label for="curp" class="form-label">Curp:</label>
            <input type="text" class="form-control" name="curp" id="curp" value="<?php echo $r['curp']; ?>">
          </div>

          <div class="col-6">
            <label for="genero" class="form-label">Género:</label>
            <select class="form-select" name="genero" id="genero">
              <?php echo '<option value="' . $r['genero'] . '"selected>' . $r['genero'] . '</option>'; ?>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Indefinido">Indefinido</option>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $r['usuario']; ?>">
          </div>

          <div class="col-6">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="text" class="form-control" name="password" id="password" value="<?php echo $r['password']; ?>">
          </div>
          <div class="col-6 mb-3">
            <label for="contrato" class="form-label">Contrato:</label>
            <input type="text" class="form-control" name="contrato" id="contrato" value="<?php echo $r['contrato']; ?>">
          </div>

          <div class="col-6 mb-3">
            <label for="nivel" class="form-label">Nivel:</label>
            <select class="form-select" name="nivel" id="nivel" onchange="completarCamposUsuarios()">
              <?php echo '<option value="' . $r['nivel'] . '"selected>' . $r['nivel'] . '</option>'; ?>
              <option value="A">A</option>
              <option value="A.1">A.1</option>
              <option value="A.2">A.2</option>
              <option value="ST">ST</option>
              <option value="C">C</option>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <select class="form-select" name="direccion" id="direccion">
              <?php echo '<option value="' . $r['direccion'] . '"selected>' . $r['direccion'] . '</option>'; ?>
              <option value="AP">AP</option>
              <option value="ST">ST</option>
              <option value="DG">DG</option>
              <option value="A">A</option>
              <option value="C">C</option>
            </select>
          </div>

          <div class="col-6">
            <label for="noEmple" class="form-label">No. de Empleado</label>
            <input type="text" class="form-control" name="noEmple" id="noEmple" value="<?php echo $r['no_empleado']; ?>">
          </div>

          <div class="col-6 mb-3">
            <label for="tipoEmpl" class="form-label">Tipo de Empleo:</label>
            <select class="form-select" name="tipoEmpl" id="tipoEmpl">
              <?php echo '<option value="' . $r['tipo_emp'] . '"selected>' . $r['tipo_emp'] . '</option>'; ?>
              <option value="Estructura">Estructura</option>
              <option value="Honorarios">Honorarios</option>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="puesto" class="form-label">Puesto:</label>
            <select class="form-select" name="puesto" id="puesto">
              <?php echo '<option value="' . $r['puesto'] . '"selected>' . $r['puesto'] . '</option>'; ?>
              <?php while ($r2 = $resultado2->fetch_assoc()) { ?>
                <option value="<?php echo $r2['puesto']; ?>"><?php echo $r2['puesto']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="subAdscrito" class="form-label">Subdirector Adscrito:</label>
            <select class="form-select" name="subAdscrito" id="subAdscrito" onchange="completarCamposUsuariosJD()">
              <?php echo '<option value="' . $r['sub_adscrito'] . '"selected>' . $r['sub_adscrito'] . '</option>'; ?>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="jefeAdscrito" class="form-label">Jefe de Departamento Adscrito:</label>
            <select class="form-select" name="jefeAdscrito" id="jefeAdscrito">
              <?php echo '<option value="' . $r['jefe_depto_adscrito'] . '"selected>' . $r['jefe_depto_adscrito'] . '</option>'; ?>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="status" class="form-label">Estatus del Usuario:</label>
            <select class="form-select" name="status" id="status">
              <?php echo '<option value="' . $r['status'] . '"selected>' . $r['status'] . '</option>'; ?>
              <option value="0">0 - Inactivo</option>
              <option value="1">1 - Activo</option>
            </select>
          </div>

        <?php
          //$conexion->close();
        } ?>

        <div class="col-12">
          <button type="submit" class="btn btn-primary" name="btnModificar" value="ok">Modificar Usuario</button>
        </div>
      </div>
    </form>
  </div>

</body>

</html>