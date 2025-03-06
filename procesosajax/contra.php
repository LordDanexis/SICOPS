<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ERROR | E_PARSE);
//require_once("../includes/clases.php");
require_once("../includes/funciones.php");

$enlace = mysqli_connect("127.0.0.1","root","","dgsub_sicops");
$nivel = ivalorSeguro($enlace, $_REQUEST['nivel']);
//-------------------------- DESINFECTAR VARIABLES -----------------------------
//------------------------------------------------------------------------------
foreach($_POST as $nombre_campo => $valor)
{
   $asignacion = "\$" . $nombre_campo . " = '" .  ivalorSeguro($enlace, $valor). "';"; 
   eval($asignacion);
   //echo "\n ".$asignacion;
   }

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
	
	// 	$sql = $conexion->select("SELECT * FROM usuarios where usuario='$userForm' ", false);
	// $r = mysql_fetch_array($sql);

	$sql = "SELECT * FROM usuarios where usuario='$userForm' ";
	$query = mysqli_query($enlace, $sql); 
	$r = mysqli_fetch_array($query, MYSQLI_ASSOC);


	$user = $r['usuario']; 
	$contrase = $r['password']; 
	$cont=$r['veces'];
	if($contrase != $old_contra ) 	
	
	{
	echo " <br> <center><h2> Contraseña Anterior Incorrecta.</center></h2>";
	echo " <br> <center><h2> Verifica tu contraseña o Contacta al Administrador del Sistema</center></h2>";
	// echo ' <img src="images/contra_incorrecta.png" align="center" alt="" width="128" height="128">';
	}
	else 
	{ 
    $cont=$cont+1;

	$sql = "UPDATE usuarios set password = '$new_contra', veces='$cont' WHERE usuario ='$userForm' ";
	mysqli_query($enlace, $sql); 
	// printf("Nuevo registro con el id %d.\n", mysqli_insert_id($enlace));

	echo "<center><h2> Cambio de Contraseña Correcto </center></h2>";
	// echo ' <img src="images/cambio_correcto.png" align="center" width="128" height="128">';
	
	session_start();
    $_SESSION['acceso'] == false;

session_destroy();
	}
@mysqli_free_result($query);

?>
