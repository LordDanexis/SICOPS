<?php

if (!empty($_POST["btninsertar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["curp"]) and !empty($_POST["genero"]) and !empty($_POST["usuario"]) and !empty($_POST["contraseña"]) and !empty($_POST["contrato"]) and !empty($_POST["nivel"]) and !empty($_POST["direccion"]) and !empty($_POST["noEmpleado"]) and !empty($_POST["tipoEmple"]) and !empty($_POST["puesto"]) and !empty($_POST["status"])) {
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
        $subAdscrito = $_POST["subAdscrito"];
        $jefeAdscrito = $_POST["jefeAdscrito"];
        $status = $_POST["status"];
        $sql = $conexion->query("INSERT INTO usuarios SET nombre='$nombre', curp ='$curp', genero ='$genero', usuario ='$usuario', password ='$contraseña', contrato ='$contrato', nivel ='$nivel', direccion ='$direccion', no_empleado ='$noEmpleado', tipo_emp ='$tipoEmple', puesto ='$puesto', sub_adscrito ='$subAdscrito', jefe_depto_adscrito ='$jefeAdscrito', status ='$status'");
        if ($sql == 1) {
            echo "<div class='alert alert-success'>Persona Registrada Correctamente</div>";
        } else {
            echo "<div class='alert alert-warning'>Error al Registrar Persona</div>";
        }
    } else {

        echo "<div class='alert alert-warning'>Alguno de los campos esta vacio</div>";
    }
}
