<?php
if (!empty($_POST["btnModificar"])) {
    // echo "<div class='alert alert-warning'>Presione el botón</div>";
    $id           = $_POST["id"] ?? '';
    $nombre       = $_POST["nombreU"] ?? '';
    $curp         = $_POST["curp"] ?? '';
    $genero       = $_POST["genero"] ?? '';
    $usuario      = $_POST["usuario"] ?? '';
    $password     = $_POST["password"] ?? '';
    $contrato     = $_POST["contrato"] ?? '';
    $puesto       = $_POST["puesto"] ?? '';
    $tipoEmpl     = $_POST["tipoEmpl"] ?? '';
    $noEmple      = $_POST["noEmple"] ?? '';
    $tipoUsuario  = $_POST["direccion"] ?? '';
    $nivel        = $_POST["nivel"] ?? '';
    $director     = $_POST["director"] ?? '';
    $subdirector  = $_POST["subdirector"] ?? '';
    $jefeDepto    = $_POST["jefeDepto"] ?? '';
    $coordinador  = $_POST["coordinador"] ?? '';
    $status       = $_POST["status"] ?? '';

    $sql = $conexion->query("UPDATE usuarios set nombre='$nombre', curp ='$curp', genero ='$genero', usuario ='$usuario', password ='$password', contrato ='$contrato', puesto ='$puesto', tipo_emp ='$tipoEmpl', no_empleado ='$noEmple', direccion ='$tipoUsuario', nivel ='$nivel', director ='$director', sub_adscrito ='$subdirector', jefe_depto_adscrito ='$jefeDepto', coordinador_AJ ='$coordinador', status ='$status'  WHERE id = '$id' ");
    if ($sql == 1) {
        echo "<div class='alert alert-success'>Modificación Exitosa</div>";
    } else {
        echo "<div class='alert alert-warning'>Error al Modificar</div>";
    }
}
