<?php
//----------------------------------- ZONA HORARIA DE MEXICO --------------------------------------------------
date_default_timezone_set("America/Mexico_City");
//-------------------------------------------------- URL -------------------------------------------------------
function damedominio()
{
	$ruta = dameurl();
	if (stripos($ruta, 'prueba') !== false) $url = "http://" . $_SERVER['HTTP_HOST'] . "/prueba";
	elseif (stripos($ruta, 'adicom/') !== false) $url = "http://" . $_SERVER['HTTP_HOST'] . "/adicom";
	else  $url = "http://" . $_SERVER['HTTP_HOST'];
	return $url;
}
//-------------------------------------------------- URL -------------------------------------------------------
function dameurl()
{
	$url = "http://" . $_SERVER['HTTP_HOST'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
	return $url;
}
//-------------------------------------------------- URL -------------------------------------------------------
function acentos($cadena)
{
	$no_permitidas = array("&eacute;");
	$permitidas = array("e");
	$texto = str_replace($no_permitidas, $permitidas, $cadena);
	return $texto;
}
//*********************************************QUITA CARACTERES ESPECIALES**************************************************
function quitar_espaciales($cadena)
{
	$no_permitidas = array("�", "á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
	$permitidas = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
	$texto = str_replace($no_permitidas, $permitidas, $cadena);
	return $texto;
}
//------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------- MENÚ PRINCIPAL -------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------
function menu($direccion)
{

	$menu = '
				<ul class="select menu" id="mInicio"> </ul>	
				<ul class="submenu redonda5 ulPo"> </ul>
				<div class="nav-divider">&nbsp;</div>
				';

	//********************************************MENÚ DE OFICIOS DGSUB********************************************************* */
	if ($direccion == "A"  || $direccion == "DG" || $direccion == "AP" || $direccion == "C" || $direccion == "ST") {

		$menu .= '
		
		<ul class="select menu" id="mInicio"> 
		    <li><a href="#nogo" class="munuSup"><b>Oficios DGSUB</b> <!--[if IE 7]><!--></a><!--<![endif]-->
		        <ul class="sub submenu redonda5 ulPfrr">
		        <li><a class="menu_pfrr redonda3" href="?cont=pfrr_oficios3"> <img src="images/alta.png" /> <span>Alta Oficio </span> </a></li> ';
		if ($direccion == "AP" || $direccion == "ST" || $direccion == "DG") $menu .= '<li><a class="menu_pfrr redonda3" href="oficios/oficios.php"> <img src="images/editar_oficio.png" /> <span>Editar Oficio </span> </a></li>
		    </li>
		        </ul>  
		</ul>';
	}
	//********************************* TERMINA MENÚ DE OFICIOS DGSUB********************************************************* */

	//*************************************************MENÚ ALTA PFRR********************************************************* */	
	if ($direccion == "AP") {
		$menu .= '
					<div class="nav-divider">&nbsp;</div>
					<ul class="select menu" id="mInicio">
						<li><a href="#" class="munuSup"><b>Alta PRA</b><!--[if IE 7]><!--></a><!--<![endif]-->
							<!--[if lte IE 6]><table><tr><td><![endif]-->
						   <ul class="sub submenu redonda5 ulMd">
							  <li> <a class="menu_md redonda3" href="Alta_PRA/registra_Pra.php"> <img src="images/alta.png" /> <span> Alta de Expedientes de Responsabilidad Administrativa</span> </a>
							     <!--<ul class="submenu2 redonda5">  <li> <a class="menu_md redonda3" href="cont=medios_rr_actores"> <img src="images/actor.png" /> Ver Actores </a> </li> </ul>-->
							   </li>
						   </ul>
						</li>
							<div class="nav-divider">&nbsp;</div>
					</ul> ';
	}
	return $menu;
}   //*******************************************TERMINA MENÚ ALTA PFRR********************************************************* */	

//------------------------------------------------------------------------------------------------------------------------
//----------------------------------------- TERMINA MENÚ PRINCIPAL -------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------


//--------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------FUNCIÓN QUE GÉNERA EL VALOR SEGURO PARA PHP 8.2.12----------------------------------- 
//-------------------------------------------------------------------------------------------------------------------------------- 
function ivalorSeguro($conn, $_Cadena)
{
	$_Cadena = @htmlspecialchars(trim(addslashes(stripslashes(strip_tags($_Cadena)))));
	$_Cadena = str_replace(chr(160), '', $_Cadena);
	return 	mysqli_real_escape_string($conn, $_Cadena);
	//return 	$_Cadena;
}
function ivalorSeguro2($_Cadena)
{
	$_Cadena = @htmlspecialchars($_Cadena);
	return $_Cadena;
}
//--------------------------------------------------------------------------------------------------------------------------------
//--------------------------------TERMINA LA FUNCIÓN QUE GÉNERA EL VALOR SEGURO PARA PHP 8.2.12-----------------------------------  
//--------------------------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------------------------------------	
function cuadroYfondo()
{
	echo '
	<div id="fondoOscuro"></div>
	<div id="cuadroDialogo" >
		<div id="cuadroTitulo"> </div>
		<div style="position: absolute; top:6px; right:6px; cursor:pointer"  onClick="cerrarCuadro()" > <img src="images/cerrar.png" /> </div>
		<div id="cuadroRes"></div>
		<div id="cuadroMen"></div>
	</div>
	';
}
//-------------------------------------------------------------------------------------------------------------------------------------------	
function cuadroYfondo2()
{
	echo '
	<div id="fondoOscuro2"></div>
	<div id="cuadroDialogo2" >
		<div id="cuadroTitulo2"> </div>
		<div style="position: absolute; top:6px; right:6px; cursor:pointer"  onClick="cerrarCuadro2()" > <img src="images/cerrar.png" /> </div>
		<div id="cuadroRes2"></div>
		<div id="cuadroMen2"></div>
	</div>
	';
}
//-------------------------------------------------------------------------------------------------------------------------------------------	
function cuadroYfondo3()
{
	echo '
	<div id="fondoOscuro3"></div>
	<div id="cuadroDialogo3" >
		<div id="cuadroTitulo3"> </div>
		<div style="position: absolute; top:6px; right:6px; cursor:pointer"  onClick="cerrarCuadro3()" > <img src="images/cerrar.png" /> </div>
		<div id="cuadroRes3"></div>
		<div id="cuadroMen3"></div>
	</div>
	';
}
//-------------------------------------------------------------------------------------------------------------------------------------------
function valid_mysql_date($str)
{
	$date_parts = explode('-', $str);
	if (count($date_parts) != 3) return false;
	if ((strlen($date_parts[0]) != 4) || (!is_numeric($date_parts[0]))) return false;
	if ((strlen($date_parts[1]) != 2) || (!is_numeric($date_parts[1]))) return false;
	if ((strlen($date_parts[2]) != 2) || (!is_numeric($date_parts[2]))) return false;
	if (!checkdate($date_parts[1], $date_parts[2], $date_parts[0])) return false;
	return true;
}
// //-------------------------------------------------------------------------------------------------------------------------------------------

// //-------------------------------------------------------------------------------------------------------------------------------------------
function fechaNormal($fecha)
{
	if (valid_mysql_date($fecha)) {
		if ($fecha != "") {
			$fecha_cad = explode("-", $fecha);
			$ano = $fecha_cad[0];
			$mes = $fecha_cad[1];
			$dia = $fecha_cad[2];

			$f_php = $dia . "/" . $mes . "/" . $ano;
			return $f_php;
			//." <b>Cambio!</b>";
		}
		return $f_php = "";
	} else return $fecha; //." <b>ES normal</b>";
}
//-------------------------------------------------------------------------------------------------------------------------------------------

//----------------------------***************ESTE COMPONENTE SE OCUPA EN EL NUEVO SISTEMA 12/02/2025******************* --------------
function estadoSistema()
{
	$enlace = mysqli_connect("127.0.0.1", "root", "", "dgsub_sicops");
	$sqltxt = "SELECT * FROM configuracion where proceso = 'statusSistema' ";
	$sql = mysqli_query($enlace, $sqltxt) or die(mysql_error() . "<br><br>SQL: $sqltxt");
	$r = mysqli_fetch_array($sql, MYSQLI_BOTH);
	return $r['boleano'];
}
//----------------------------***************ESTE COMPONENTE SE OCUPA EN EL NUEVO SISTEMA******************* --------------

// //------------------FUNCIÓN QUE ELIMINA LOS CARACTES ESPECIALES Y DEJA LA VARIABLE COMO UNA CADENA DE PURO TEXTO----------------------------
function cadenaNormalOficio($cadena)
{
	// 	//stripslashes(html_entity_decode(
	$cadena   = urldecode($cadena);
	$cadenaOK = stripslashes($cadena);
	$cadenaOK = html_entity_decode($cadenaOK);

	$cadenaOK = str_replace("\"", "", $cadenaOK);
	$cadenaOK = str_replace("!", "/", $cadenaOK);
	$cadenaOK = str_replace(" ", "", $cadenaOK);
	$cadenaOK = str_replace("\"", "", $cadenaOK);
	$cadenaOK = str_replace("\'", "", $cadenaOK);
	$cadenaOK = str_replace("---", "-\"", $cadenaOK); //evitaconficto --- X --
	$cadenaOK = str_replace("--", "\"", $cadenaOK);

	return $cadenaOK;
}

//**********Funcion que elimina las comillas dobles (") de un arreglo y sustituye por (!) PFRR PARA INSERTAR****************//
function cadenaSinEspeciales($cadena)
{
	$cadenaOK = urldecode($cadena);
	$cadenaOK = html_entity_decode($cadenaOK);
	$cadenaOK = str_replace("\"", "!", $cadenaOK);

	return $cadenaOK;
}
//*********TERMINA funcion que elimina las comillas dobles (") de un arreglo y sustituye por (!)**********//

//***************Funcion Reversa cambia los signos (!) por comillas dobles (") FOLIO PARA EL LINK**********************
function cadenaSinEspecialesR($cadena)
{
	$cadenaOK = urldecode($cadena);
	$cadenaOK = html_entity_decode($cadenaOK);
	$cadenaOK = str_replace("\"", "!", $cadenaOK);
	$cadenaOK = str_replace("/", "!", $cadenaOK);

	return $cadenaOK;
}
//**********TERMINA Funcion Reversa cambia los signos (!) por comillas dobles (")**********************//


//*************Función que vuelve a su formato original el oficio*****************/
function transformaOficio($cadena)
{
	$cadenaOK = urldecode($cadena);
	//$cadenaOK = stripslashes($cadenaOK);
	$cadenaOK = html_entity_decode($cadenaOK);
	$cadenaOK = str_replace("!A!", "\"", $cadenaOK);
}
//***********************TERMINA Función que vuelve a su formato original el oficio*****************//



//--------------- sacamos los oficios de la tabla archivos y los reemplazamos por sus respectivos links ------------------
function verificaOficioLink($oficio)
{
	//Aquí se guarda el oficio normal en ofiNormal
	$ofiNormal = $oficio;

	$oficio = cadenaSinEspecialesR($oficio);
	// $oficio = str_replace("\'", "", $oficio);
	// $oficio = str_replace("\"", "", $oficio);
	// $oficio = str_replace("/", "!", $oficio);
	// $oficio = str_replace(" ", "", $oficio);

	// $sqlO = mysql_query("SELECT * FROM archivos WHERE oficioDoc = '" . $oficio . "' limit 1");
	// $o = mysql_fetch_assoc($sqlO);
	// $no = mysql_num_rows($sqlO);

	$enlace = mysqli_connect("127.0.0.1", "root", "", "dgsub_sicops");
	$sqlO = "SELECT * FROM archivos WHERE oficioDoc = '" . $oficio . "' limit 1";
	$sql = mysqli_query($enlace, $sqlO);
	$o = mysqli_fetch_array($sql, MYSQLI_BOTH);
	$no = mysqli_num_rows($sql);

	if ($no)
		return $link = "<a href=\"#\" onclick=\"verPdf('" . $o['nombreDoc'] . "')\"> " . $ofiNormal . " </a> ";
	else
		return $link = $ofiNormal;
}

//------------------------------------ GENERADOR DE OFICIOS -----------------------------------------------
function generaOficios($tipo = "", $procedimiento, $fechaOficio, $horaOficio, $remitente, $cargo, $dependencia, $asunto, $oficioRef, $userForm, $dirForm, $userForm2, $tipoOficio)
{
	if ($dirForm == 'ST') {

		$enlace = mysqli_connect("127.0.0.1", "root", "", "dgsub_sicops");
		$sql = "SELECT consecutivo, concat('DGSUB\"A\"/','" . "',lpad(consecutivo,4,'0'),'/',year(now())) as folio from ( SELECT ifnull(max(consecutivo),0) + 1 as consecutivo FROM oficios WHERE fecha_oficio BETWEEN concat(year(now()),'-01-01') and concat(year(now()),'-12-31 23:59:59')  ) dos";
		$q = mysqli_query($enlace, $sql);
		$r = mysqli_fetch_array($q, MYSQLI_BOTH);
		$consecutivo = $r['consecutivo'];
		$folio = $r['folio'];

		if ($consecutivo > 0) {
			//-------------------------------------------------------------------------------
			$query = "INSERT INTO oficios 
								  SET 
									consecutivo = '$consecutivo',
									folio = '$folio',
									fecha_oficio = '$fechaOficio',
									hora_oficio = '$horaOficio',
									procedimiento = '" . $procedimiento . "',
									nivel = '$dirForm',
									observaciones = '$oficioRef',
									destinatario = '$remitente',
									cargo_destinatario = '$cargo',
									dependencia = '$dependencia',
									asunto = '" . $asunto . "',
									abogado_solicitante = '" . $userForm . "',
									firma_oficio = '$userForm2',
									tipo = '$tipoOficio',
									tipoOficio = '" . $tipo . "',
									status = 1,
									juridico = 1 ";
			mysqli_query($enlace, $query);
			return $folio;
		} else {
			return "ERROR";
		}
	} else {

		$enlace = mysqli_connect("127.0.0.1", "root", "", "dgsub_sicops");
		$sql = "SELECT consecutivo, concat('DGSUB\"A\"/','" . $dirForm . '/' . "',lpad(consecutivo,4,'0'),'/',year(now())) as folio from ( SELECT ifnull(max(consecutivo),0) + 1 as consecutivo FROM oficios WHERE fecha_oficio BETWEEN concat(year(now()),'-01-01') and concat(year(now()),'-12-31 23:59:59')  ) dos";
		//$sql = "SELECT ifnull(max(consecutivo),0) + 1 as consecutivo, concat('DGSUB\"A\"/','" . $dirForm . '/' . "',lpad(ifnull(max(consecutivo),0) + 1,4,'0'),'/',year(now())) as folio FROM oficios";
		$query = mysqli_query($enlace, $sql);
		$r = mysqli_fetch_array($query, MYSQLI_BOTH);
		$consecutivo = $r['consecutivo'];
		$folio = $r['folio'];

		if ($consecutivo > 0) {
			//-------------------------------------------------------------------------------
			$query = "INSERT INTO oficios 
							  SET 
								consecutivo = '$consecutivo',
								folio = '$folio',
								fecha_oficio = '$fechaOficio',
								hora_oficio = '$horaOficio',
								procedimiento = '$procedimiento',
								nivel = '$dirForm',
								observaciones = '$oficioRef',
								destinatario = '$remitente',
								cargo_destinatario = '$cargo',
								dependencia = '$dependencia',
								asunto = '$asunto',
								abogado_solicitante = '" . $userForm . "',
								firma_oficio = '$userForm2',
								tipo = '$tipoOficio',
								tipoOficio = '" . $tipo . "',
								status = 1,
								juridico = 1 ";

			mysqli_query($enlace, $query);
			//printf("Nuevo registro con el id %d.\n", mysqli_insert_id($enlace));
			return $folio;
		} else {

			return "ERROR";
		}
	}
}
