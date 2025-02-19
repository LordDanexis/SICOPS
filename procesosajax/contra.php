<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ERROR | E_PARSE);
require_once("../includes/clases.php");
require_once("../includes/funciones.php");
// $conexion = new conexion;
// $conexion->conectar();
//-------------------------- DESINFECTAR VARIABLES -----------------------------
//------------------------------------------------------------------------------

// foreach($_POST as $nombre_campo => $valor)
// {
//    $asignacion = "\$" . $nombre_campo . " = '" . ivalorSeguro2($valor) . "';"; 
//    eval($asignacion);
//    //echo "\n ".$asignacion;
// } 

//-------------------------------------------------------------------------------
//-------------------------------------------------------------------------------
//-------------------------------------------------------------------------------
//--------------- COMPROBACION DE QUE NO SE REPITA OFICIO -----------------------

//$sql = $conexion->select("SELECT * FROM solicitud_ayuda WHERE num_accion LIKE '$acciones' AND hora_oficio = '$horaOficio' AND abogado_solicitante = '$userForm'   ", false);
//$TO = mysql_num_rows($sql);

//-------------------------------------------------------------------------------
//-------------------------------------------------------------------------------
//------------------- GENERACION DEL VOLANTE ------------------------------------
//-------------------------------------------------------------------------------
//-------------------------------------------------------------------------------
//------------------- IMPORTANTE NO MOVER EL ORDEN DE LOS PROCESOS --------------
//------------------- buscamos año del ultimo oficio  ---------------------------
//-- de la tabla de folios buscamos por id y de mas a menos y tenemos el ultimo.-
//-------------------------------------------------------------------------------
	//------------------- comparamos año anterior con el actual ---------------------
	//-- si los años son diferentes se reinicia el consecutivo de folios ------------
	//-------------------------------------------------------------------------------
	
	$sql = "SELECT * FROM usuarios where usuario='$userForm' ";
	$result = $conn->query($sql);
	$r = $result->fetch_array(MYSQLI_ASSOC);
	$user = $r['usuario']; 
	$contrase = $r['password']; 
	$cont=$r['veces'];
	if($contrase != $old_contra ) 	
	
	{
	echo "<center><h2>Contraseña Anterior Incorrecta </center></h2>";
	}
	else 
	{ 
    $cont=$cont+1;

	// $sql = $conexion->update("update usuarios set password='$new_contra', veces='$cont' where usuario ='$userForm'",false);
	$update = "update usuarios set password='$new_contra', veces='$cont' where usuario ='$userForm'";
	$result = $conn->query($update);
	printf("Affected rows (UPDATE): %d\n", $conn->affected_rows);
							
	$ultimo_id = $conn->insert_id; 


	
	echo "<center><h2>Cambio de Contraseña Correcto </center></h2>";
	echo $userForm;

	echo $ultimo_id;
	session_start();
$_SESSION['acceso'] == false;

session_destroy();
	}
	//echo "<center><font face='Arial size='10''><b>[Tiempo de espera estimado 60 minutos]</b> ";
// end TO
//@mysqli_free_result($r);
//@$result->free();
?>
