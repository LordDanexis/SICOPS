<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");

require_once("../includes/clases.php");
require_once("../includes/funciones.php");
$enlace = mysqli_connect("127.0.0.1","root","","dgsub_sicops");
//**********VARIABLES QUE SE ENVÍAN A LA FUNCIÓN QUE GENERA EL OFICIO************* */
$userForm      = $_POST['userForm'];
$userForm2     = $_POST['userForm2'];
$procedimiento = $_POST['procedimiento']; 
$remitente     = $_POST['remitente'];
$cargo         = $_POST['cargo']; 
$dependencia   = $_POST['dependencia']; 
$asunto        = $_POST['asunto']; 
$dirForm       = $_POST['dirForm']; 
$oficioRef     = $_POST['oficioRef']; 
$tipo          = "pfrr";
$tipoOficio    = "null";
$fechaOficio = date('Y-m-d');
$horaOficio = date("H:i:s");
//-------------------------- DESINFECTAR VARIABLES -----------------------------
//------------------------------------------------------------------------------
// foreach($_POST as $nombre_campo => $valor)
// {
//    $resultado = strpos($nombre_campo, "accionVinculada_"); 
//    if($resultado  !== FALSE)
//    {
// 	   //$acciones .= valorSeguro($valor)."|";
//    }
//    else
//    {
//   // $asignacion = "\$" . $nombre_campo . " = '" . valorSeguro($valor) . "';"; 
//    //eval($asignacion);
//    //echo "\n ".$asignacion;
//    }
// }
// //echo "\n\n Acciones: ".$acciones."\n\n ";
 
// if (is_array($_POST['oficioRef'])){
// foreach ($_POST['oficioRef'] as $cont) { $contpr .= valorSeguro($cont)."|"; }
// $oficioRef ='varios_pr_OT';
// }
//-------------------------------------------------------------------------------
//-------------------------------------------------------------------------------
//-------------------------------------------------------------------------------
//--------------- COMPROBACION DE QUE NO SE REPITA OFICIO -----------------------

//$procedimiento = str_replace("\\", "", $procedimiento);
// $sql = $conexion->select("SELECT procedimiento,hora_oficio,abogado_solicitante,tipo FROM oficios WHERE procedimiento LIKE '$procedimiento' AND hora_oficio = '$horaOficio' AND abogado_solicitante = '$userForm'   ", false);
// $TO = mysql_num_rows($sql);

$sql = "SELECT procedimiento,hora_oficio,abogado_solicitante,tipo FROM oficios WHERE procedimiento LIKE '$procedimiento' AND hora_oficio = '$horaOficio' AND abogado_solicitante = '$userForm'   ";
$o = mysqli_query($enlace, $sql);
$TO = mysqli_num_rows($o);

//------------------------------------------------------------------------------------------
//------------------- INSERTA DATOS EN LA TABLA OFICIOS_CONTENIDO  -------------------------
//------------------------------------------------------------------------------------------
if($TO == 0){
	//-------------------------------------------------------------------------------
	$folio = generaOficios($tipo = "pfrr",$fechaOficio, $horaOficio, $procedimiento, $presunto = "", $oficioRef, $remitente, $cargo, $dependencia, $asunto, $userForm, $userForm2, $dirForm, $tipoOficio);
    
	//$enlace = mysqli_connect("127.0.0.1","root","","dgsub_sicops");
	$sqlX = "INSERT INTO oficios_contenido 
 										SET 
 											 folio = '".$folio."',
 											 procedimiento = '".$procedimiento."',
 											 observaciones = '".$oficioRef."',
 											 juridico = 1 ";
											mysqli_query($enlace, $sqlX); 
       //printf ("Nuevo registro con el id %d.\n", mysqli_insert_id($enlace));
	   
											// mysqli_free_result($r);
											  //printf("There are %u million bicycles in %s.",$number,$str);

 
	//-------------------------------------------------------------------------------
	//$partesAcciones = explode("|",$procedimiento);
// 	if($oficioRef != "varios_pr_OT")
// {
// 	//-------------- INSERTAMOS EN LA TABLA FOLIOS CONTENIDO CADA ACCION -------------------------------
// 	foreach($partesAcciones as $k => $v)
// 	{
// 		if($v != "")
// 		{
// 			$sqlX = $conexion->insert("INSERT INTO oficios_contenido 
// 										SET 
// 											 folio = '".$folio."',
// 											 procedimiento = '".$v."',
// 											 observaciones = '".$oficioRef."',
// 											 juridico = 1 ",false);
// 		}
// 	}

// } else {

// 	$divide_cont = explode("|",$contpr);
// 	$v = $partesAcciones[0];

// 	if ($divide_cont[0] == "0") {$oficioRef ='Todo el PFRR';

// 	foreach($partesAcciones as $k => $v)
// 	{
// 		if($v != "")
// 		{
// 			$sqlX = $conexion->insert("INSERT INTO oficios_contenido 
// 										SET 
// 											 folio = '".$folio."',
// 											 procedimiento = '".$v."',
// 											 observaciones = '".$oficioRef."',
// 											 juridico = 1 ",false);
// 		}
// 	}

// 	} else {
// 	//-------------- INSERTAMOS EN LA TABLA FOLIOS CONTENIDO CADA ACCION -------------------------------
// 	foreach($divide_cont as $divide)
// 	{
// 		if($divide != "")
// 		{
// 			$sqlX = $conexion->insert("INSERT INTO oficios_contenido 
// 										SET 
// 											 folio = '".$folio."',
// 											 procedimiento = '".$v."',
// 											 idPresunto = '".$divide."',
// 											 observaciones = '".$oficioRef."',
// 											 juridico = 1 ",false);
// 		}
// 	}
// 	}
// }

	//--------------------- SUMAMOS 90 DÍAS NATURALES A FECHA ------------------------------------------
	$fecha90 = strtotime ( '+90 day' , strtotime ( $fechaOficio ) ) ;
	$fecha90 = date ( 'Y-m-d' , $fecha90 );
	//-------------------------------------------------------------------------------------------------
	
	
	//----------------------------------------------------- VERIFICA QUE NO EXISTA EL NUEVO REMITENTE SI EXISTE NO LO INGRESA -----------------------------------------
		
	    // $sql = $conexion->select("SELECT * FROM pfrr_nombres WHERE nombre = '".$remitente."' AND cargo = '".$cargo."'	AND dependencia = '".$dependencia."' ",false);	
		// $total = mysql_num_rows($sql);
		
		// if($total == 0)
		//  $sql = $conexion->insert("INSERT INTO pfrr_nombres SET nombre = '$remitente', cargo = '$cargo', dependencia = '$dependencia'",false);	

		 $sql = "SELECT * FROM pfrr_nombres WHERE nombre = '".$remitente."' AND cargo = '".$cargo."' AND dependencia = '".$dependencia."' ";
		 $query = mysqli_query($enlace, $sql);
         $total = mysqli_num_rows($query);	
		
		 if($total == 0)
		 {
		 $sql3 = "INSERT INTO pfrr_nombres SET nombre = '$remitente', cargo = '$cargo', dependencia = '$dependencia'";
		 mysqli_query($enlace, $sql3); 
         //printf ("Nuevo registro con el id %d.\n", mysqli_insert_id($enlace));

		 }
	//-------------------------------------------TERMINA DE VERIFICAR QUE NO EXISTA EL NUEVO REMITENTE SI EXISTE NO LO INGRESA -----------------------------------------	 

	
echo "<br><br><center><h2>Se generó el número de oficio <br><br>$folio</center></h2>";
@mysqli_free_result($query);

}// end TO
else
{ echo "<br><br><center><h2>Ya existe un oficio idéntico... <br> Notifíquelo a la Administración </center></h2>"; }
	
@mysqli_free_result($o);
?>
