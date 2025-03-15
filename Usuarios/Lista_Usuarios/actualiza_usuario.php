<?php
if (!empty($_POST["btnModificar"])) {
    // echo "<div class='alert alert-warning'>Presione el botón</div>";
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $curp = $_POST["curp"];
    $genero = $_POST["genero"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $contrato =  $_POST["contrato"];
    $nivel = $_POST["nivel"];
    $direccion = $_POST["direccion"];
    $noEmple = $_POST["noEmple"];
    $tipoEmpl = $_POST["tipoEmpl"];
    $puesto = $_POST["puesto"];
    $subAdscrito = $_POST["subAdscrito"];
    $jefeAdscrito = $_POST["jefeAdscrito"];
    $status = $_POST["status"];
    $sql = $conexion->query("UPDATE usuarios set nombre='$nombre', curp ='$curp', genero ='$genero', usuario ='$usuario', password ='$password', contrato ='$contrato', nivel ='$nivel', direccion ='$direccion', no_empleado ='$noEmple', tipo_emp ='$tipoEmpl', puesto ='$puesto', sub_adscrito ='$subAdscrito', jefe_depto_adscrito ='$jefeAdscrito', status ='$status'  WHERE id = '$id' ");
    if ($sql == 1) {
        echo "<div class='alert alert-success'>Modificación Exitosa</div>";
    } else {
        echo "<div class='alert alert-warning'>Error al Modificar</div>";
    }
}
