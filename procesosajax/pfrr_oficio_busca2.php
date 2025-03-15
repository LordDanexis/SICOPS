<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");

//require_once("../includes/clases.php");
require_once("../includes/funciones.php");
$enlace = mysqli_connect("127.0.0.1", "root", "", "dgsub_sicops");

//-------------------------- DESINFECTAR VARIABLES -----------------------------
//------------------------------------------------------------------------------
$texto = ivalorSeguro($enlace, $_REQUEST['texto']);
$usuario = ivalorSeguro($enlace, $_REQUEST['usuario']);
$direccion = ivalorSeguro($enlace, $_REQUEST['direccion']);
$nivel = ivalorSeguro($enlace, $_REQUEST['nivel']);
$nombre = ivalorSeguro($enlace, $_REQUEST['nombre']);

switch ($nivel) {
	case "A.1":
		$sql = "SELECT *,o.folio Folio, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%' AND nivel = 'A.1' AND o.status = '1') 
	        GROUP BY folio ORDER BY o.consecutivo DESC";
		break;

	case "A.2":
		$sql = "SELECT *,o.folio Folio, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%' AND nivel = 'A.2' AND o.status = '1') 
	        GROUP BY folio ORDER BY o.consecutivo DESC";
		break;

	case "C":
		$sql = "SELECT *,o.folio Folio, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%' AND nivel = 'C' AND o.status = '1') 
	        GROUP BY folio ORDER BY o.consecutivo DESC";
		break;

	case "A":
		$sql = "SELECT *,o.folio Folio, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%') 
			GROUP BY folio ORDER BY o.consecutivo DESC";
		break;

	case "ST":
		if ($usuario == "ioleon" || $usuario == "bhcalva") {
			$sql = "SELECT *,o.folio Folio, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%' AND nivel = 'ST' AND o.status = '1') 
		    GROUP BY folio ORDER BY o.consecutivo DESC";
		} else {
			$sql = "SELECT *,o.folio Folio, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%' ) 
			GROUP BY folio ORDER BY o.consecutivo DESC";
		}
		break;

	default:
		$sql = "";
}

if ($sql == "") {
	echo  "<h1> EL USUARIO NO SE ENCUENTRA REGISTRADO EN EL SISTEMA Y NO PUEDE VISUALIZAR LOS OFICIOS DEL ÁREA.</h1>";
	echo  "<h2> Contacte Al Administrador De Sistemas</h2>";
} else {
	$query = mysqli_query($enlace, $sql);
	$total = mysqli_num_rows($query);

	$tabla = '
<table border="0" align="center" cellpadding="0" cellspacing="0" id="product-table" >
<!--<thead> -->
<tr>
<th class="anchoNum"><a href="#">#</a></th>
<th class="anchoFolio"><a href="#"> OFICIO </a></th>
<th class="anchoCarga"><a href="#"> ACUSES </a></th>
<th class="anchoProc"><a href="#"> PROCEDIMIENTO </a></th>
<th class="anchoFecha"><a href="#"> FECHA </a></th>
<th class="anchoDest"><a href="#"> DESTINATARIO</a></th>
<th class="anchoCarg"><a href="#"> CARGO</a></th>
<th class="anchoDep"><a href="#"> DEPENDENCIA </a></th>
<th class="anchoAsu"><a href="#"> ASUNTO </a></th>
<th class="anchoSoli"><a href="#"> ABOGADO SOLICITANTE </a></th>
<th class="anchoArea"><a href="#"> ÁREA </a></th>
<th class="anchoFirma"><a href="#"> FIRMA </a></th>
<th class="anchoStatus"><a href="#"> ESTATUS </a></th>
<!-- <th class="anchoObs" title="OBSERVACIONES"><a href="#"> OBS... </a></th> -->
</tr>
<!-- </thead> -->
<tbody> 
';
	$row = 0;
	while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$row++;
		$estilo = "class='non'";

		//------------ MUESTRA FILAS LA FUNCION PROCESO PO SE ENCARGA DE ABRIR EL CUADRO Y CARGAR LA PAGINA ---------------
		if ($r['state'] == 0) $txtStatus = "CANCELADO";
		if ($r['state'] == 1) $txtStatus = " ";
		if ($r['state'] == 2) $txtStatus = " ";


		//---------- vemos si esta en archivos ---------------------//
		if ($r['Folio'] == "") $folio = $r['idFol'];

		$folioOf = $r['Folio']; 	//Aquí se almacena el Oficio con el Formato Original ($folioOf)
		$folioF = cadenaSinEspeciales($folioOf);
		$folioOk = str_replace("/", "!", $folioF); //Aqui se transforma el No. de oficio a un formato especial con signos de admiración (!) y se guarda en la variable: $folioOk

		//Esta funcion transforma el No. de Procedimiento a un formato especial con signos de admiración (!) y se guarda en la variable: $folioOk
		$procedimiento = $r['procedimiento'];
		$procedimientoF = cadenaSinEspeciales($procedimiento);


		$sql0 = "SELECT * FROM archivos WHERE oficioDoc = '" . $folioOk . "' ";
		$z = mysqli_query($enlace, $sql0); //pasas la query a la conexion
		$ofi = mysqli_fetch_array($z, MYSQLI_BOTH);
		$idOficio = $r['consecutivo']; //***************Este es el Id que identifica cada Oficio******************
		// $statusO = $r['state'];
		// $disabled = "";

		if ($ofi != 0) {
			$linkSubirArchivo = "";
			$status = 'CARGADO';
			$linkSubirArchivo2 = '<a href="#" title="Remplazar Archivo" onclick=\'new mostrarCuadro(300,400,"Remplazar archivo",70,"cont/pfrr_oficio_subir2.php","idOficio=' . $idOficio . '&procedimiento=' . $procedimientoF . '&folio=' . $folioF . '")\' >  <img src="images/page_16_remove.png" /> </a>';
		} else {
			$linkSubirArchivo2 = "";
			$status = 'PENDIENTE';
			$linkSubirArchivo = '<a href="#" title="Subir Archivo" onclick=\'new mostrarCuadro(300,400,"Subir archivo",70,"cont/pfrr_oficio_subir.php","idOficio=' . $idOficio . '&procedimiento=' . $procedimientoF . '&folio=' . $folioF . '")\'>  <img src="images/Upload.png" /> </a>';
		}

		//---------- Aquí se imprimen las columnas de la Tabla Oficios---------------------//
		$tabla .= '
				<tr ' . $estilo . ' >
			
				    <td class="ofiNum">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', subject: $row) . '</td>
					<td class="ofiFolio">' . $txtStatus . ' ' . verificaOficioLink($folioOf) . '</td> 
					<td class="ofiCarga"> ' . $linkSubirArchivo . '' . $linkSubirArchivo2 . ' </td>
					<td class="ofiProc">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $r['procedimiento']) . '</td>
					<td class="ofiFecha">' . fechaNormal($r['fecha_oficio']) . '</td>
					<td class="ofiCarg">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $r['destinatario']) . '</td>
					<td class="ofiDest">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $r['cargo_destinatario']) . '</td>
					<td class="ofiDep">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $r['dependencia']) . '</td>
					<td class="ofiAsu" title="Observaciones: ' . $r['observaciones'] . '">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $r['asunto']) . '</td>
					<td class="ofiSoli">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $r['abogado_solicitante']) . '</td>
					<td class="ofiArea">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $r['nivel']) . '</td>
					<td class="ofiFirma">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $r['firma_oficio']) . '</td>
					<td class="ofiStatus">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $status) . '</td>

				<!--	<td class="ofiObs">' . str_ireplace($texto, '<span class="b">' . $texto . '</span>', $r['observaciones']) . '  </td> -->
                    <!-- <a href="#" title="Ver Informacion" onclick=\'new mostrarCuadro(500,700,"Información del Oficio",70,"cont/pfrr_oficio_notifica2.php","id=' . $r['id'] . '&abogado=' . $r['abogado_solicitante'] . '&folio=' . $folioOk . '")\' >  <img src="images/ver_informacion.png"> </a>	-->
				</tr>';
	}
	$tabla .= '
				</tbody>
				</table>
				';
	//---------- Aquí termina el código que imprime las columnas de la Tabla de Oficios---------------------//

	if ($total == 0) $tabla = "<center><br><br><br><br><h3> No se encontraron oficios </h3><br><br><br></center>";
	echo $tabla;
	//mysql_free_result($sql);	
	mysqli_free_result($query);
	mysqli_close($enlace);
}
