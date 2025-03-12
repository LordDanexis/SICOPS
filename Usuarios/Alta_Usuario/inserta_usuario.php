<?php
require_once('../../BusquedaO/conexion.php');

if (!empty($_POST["btninsertar"])) {
    //$id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $curp = $_POST["curp"];
    $genero = $_POST["genero"];
    $usuario = $_POST["usuario"];
    $contraseña =  $_POST["contraseña"];
    $contrato = $_POST["contrato"];
    $nivel = $_POST["nivel"];
    $direccion = $_POST["direccion"];
    $noEmpleado = $_POST["noEmpleado"];
    $tipoEmple = $_POST["tipoEmple"];
    $puesto = $_POST["puesto"];
    $subdirectorA = $_POST["subdirectorA"];
    $jefeDeptoA = $_POST["jefeDeptoA"];
    $status = $_POST["status"];
    $sql = $conexion->query("INSERT INTO nombre SET folio='$nombre', curp ='$curp', genero ='$genero', usuario ='$usuario', password ='$contraseña', contrato ='$contrato', nivel ='$nivel', direccion ='$direccion', no_empleado ='$noEmpleado', tipo_emp ='$tipoEmple', puesto ='$puesto', sub_adscrito ='$subAdscrito', jefe_depto_adscrito ='$jefeAdscrito', status ='$status'");
    if ($sql == 1) {
        //header("Location:OficiosB.php");
        $mensaje = "¡INSERTASTE CORRECTAMENTE EL REGISTRO!";
        echo "<script type='text/javascript'>alert('$mensaje');</script>";
    } else {
        echo "<div class='alert alert-warning'>Error al Modificar</div>";
    }
}
