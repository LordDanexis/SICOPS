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

$sql = "SELECT procedimiento,hora_oficio,abogado_solicitante,tipo FROM oficios WHERE procedimiento LIKE '$procedimiento' AND hora_oficio = '$horaOficio' AND abogado_solicitante = '$userForm'   ";
$o = mysqli_query($enlace, $sql);
$TO = mysqli_num_rows($o);

//------------------------------------------------------------------------------------------
//------------------- INSERTA DATOS EN LA TABLA OFICIOS_CONTENIDO  -------------------------
//------------------------------------------------------------------------------------------
if($TO == 0){
	//-------------------------------------------------------------------------------
	$folio = generaOficios($tipo = "pfrr",$fechaOficio, $horaOficio, $procedimiento, $presunto = "", $oficioRef, $remitente, $cargo, $dependencia, $asunto, $userForm, $userForm2, $dirForm, $tipoOficio);
    
	$sqlX = "INSERT INTO oficios_contenido 
 										SET 
 											 folio = '".$folio."',
 											 procedimiento = '".$procedimiento."',
 											 observaciones = '".$oficioRef."',
 											 juridico = 1 ";
											mysqli_query($enlace, $sqlX); 


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

} else { 
	echo "<br><br><center><h2>Ya existe un oficio idéntico... <br> Notifíquelo a la Administración </center></h2>"; 
}
	
@mysqli_free_result($o);
?>
