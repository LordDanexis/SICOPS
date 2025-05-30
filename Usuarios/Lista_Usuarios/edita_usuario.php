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
  <?php include '../../encabezados/encabezadoModulos.php'; ?>
  <div class="container">

    <div class="row row-cols-2 text-center">
      <div class="col-6 mt-3">
        <h2>Edita Usuarios DGSUB </h2>
      </div>
      <div class="col mt-3"><a href="../../usuarios/Lista_Usuarios/usuarios.php" class="btn btn-dark">Regresar</a></div>
    </div>

    <form action="" method="POST">
      <div class="row mt-5">
        <?php include "actualiza_usuario.php";
        while ($r = $resultado->fetch_assoc()) { ?>
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
          <div class="col-6">
            <label for="nombreU" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombreU" id="nombreU" value="<?php echo $r['nombre']; ?>">
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
            <label for="puesto" class="form-label">Puesto:</label>
            <select class="form-select" name="puesto" id="puesto">
              <?php echo '<option value="' . $r['puesto'] . '"selected>' . $r['puesto'] . '</option>'; ?>
              <?php while ($r2 = $resultado2->fetch_assoc()) { ?>
                <option value="<?php echo $r2['puesto']; ?>"><?php echo $r2['puesto']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="tipoEmpl" class="form-label">Tipo de Empleo:</label>
            <select class="form-select" name="tipoEmpl" id="tipoEmpl">
              <?php echo '<option value="' . $r['tipo_emp'] . '"selected>' . $r['tipo_emp'] . '</option>'; ?>
              <option value="Estructura">Estructura</option>
              <option value="Honorarios">Honorarios</option>
            </select>
          </div>

          <div class="col-6">
            <label for="noEmple" class="form-label">No. de Empleado</label>
            <input type="text" class="form-control" name="noEmple" id="noEmple" value="<?php echo $r['no_empleado']; ?>">
          </div>

          <div class="col-6 mb-3">
            <label for="direccion" class="form-label">Tipo de Usuario:</label>
            <select class="form-select" name="direccion" id="direccion">
              <?php echo '<option value="' . $r['direccion'] . '"selected>' . $r['direccion'] . '</option>'; ?>
              <option value="AP">AP (Administrador principal puede ver todo incluyendo los módulos en desarrollo)</option>
              <option value="ST">ST (Secretaría Técnica, puede visualizar todo, excepto los módulos en desarrollo)</option>
              <!-- <option value="DG">DG </option> -->
              <option value="A">A (Puede visualizar módulos limitados para su área no incluye ningún modulo de edición)</option>
              <option value="C">C (Unicamente sirve para visualizar el módulo de alta de oficios de las áreas a integrarse)</option>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="nivel" class="form-label">Nivel:</label>
            <select class="form-select" name="nivel" id="nivel" onchange="selectDinamicoEditaUsuario()">
              <?php echo '<option value="' . $r['nivel'] . '"selected>' . $r['nivel'] . '</option>'; ?>
              <option value="A">A</option>
              <option value="A.1">A.1</option>
              <option value="A.2">A.2</option>
              <option value="ST">ST</option>
              <option value="C">C</option>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="director" class="form-label">Director:</label>
            <select class="form-select" id="director" name="director">
              <option value="" selected disabled>Selecciona un Director de Área...</option>
            </select>
          </div>

          <div class="col-6">
            <label for="subdirector" class="form-label">Subdirector:</label>
            <select class="form-select" id="subdirector" name="subdirector">
              <option value="" selected disabled>Selecciona un Subdirector de Área...</option>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="jefeDepto" class="form-label">Jefe de Departamento:</label>
            <select class="form-select" id="jefeDepto" name="jefeDepto">
              <option value="" selected disabled>Selecciona un Jefe de Departamento...</option>
            </select>
          </div>

          <div class="col-6 mb-3">
            <label for="coordinador" class="form-label">Coordinador de Auditores Juridicos:</label>
            <select class="form-select" id="coordinador" name="coordinador">
              <option value="" selected disabled>Selecciona un Corrdinador de Auditores Juridicos...</option>
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

        <div class="col-12 mb-3 text-center">
          <button type="submit" class="btn btn-primary" name="btnModificar" value="ok">Modificar Usuario</button>
        </div>

      </div>
    </form>
  </div>

</body>

</html>