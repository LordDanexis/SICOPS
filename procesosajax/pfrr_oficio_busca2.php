<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");
require_once("../includes/clases.php");
require_once("../includes/funciones.php");
$enlace = mysqli_connect("127.0.0.1","root","","dgsub_sicops");
//$conexion = new conexion;
//$conexion->conectar();
//-------------------------- DESINFECTAR VARIABLES -----------------------------
//------------------------------------------------------------------------------
$texto = ivalorSeguro($enlace, $_REQUEST['texto']);
$usuario = ivalorSeguro($enlace, $_REQUEST['usuario']);
$direccion = ivalorSeguro($enlace, $_REQUEST['direccion']);
$nivel = ivalorSeguro($enlace, $_REQUEST['nivel']);
$nombre = ivalorSeguro($enlace, $_REQUEST['nombre']);

	switch($nivel) {
		case "A.1":
			$sql = "SELECT *,o.folio Folio,o.id, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%' AND nivel = 'A.1') 
	        group by folio ORDER BY o.id";  
		break;
		
		case "A.2":
			$sql = "SELECT *,o.folio Folio,o.id, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%' AND nivel = 'A.2') 
	         ORDER BY o.id";  
		break;
		
		case "ST":
			if ($usuario == "ioleon" || $usuario == "bhcalva")
			{
				$sql = "SELECT *,o.folio Folio,o.id, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%' AND nivel = 'ST') 
				group by folio ORDER BY o.id";
			}
			else
			{
			$sql = "SELECT *,o.folio Folio,o.id, o.tipo idFol,o.status as state  FROM oficios o WHERE (folio LIKE '%" . $texto . "%' ) 
	        group by folio ORDER BY o.id";
			}
		break;
		
		default:
		  $sql = "El usuario que ingreso no se Encuentra Registrado en el Área Adscrita";
	}

	// $sql = "SELECT *,
	//                            o.folio Folio,
	// 						   o.id,
	// 						   o.tipo idFol,
	// 						   o.status as state  
	//                      FROM oficios o
	// 							WHERE 
	// 							(   
	// 								folio LIKE '%".$texto."%' OR 
	// 							    procedimiento LIKE '%".$texto."%' OR
	// 								fecha_oficio LIKE '%".$texto."%' OR  
	// 								consecutivo LIKE '%".$texto."%' OR
	// 								destinatario LIKE '%".$texto."%' OR 
	// 								observaciones LIKE '%".$texto."%' OR 
	// 								asunto LIKE '%".$texto."%' OR 
	// 								Folio LIKE '%".$texto."%' OR
	// 								id LIKE '%".$texto."%'
	// 							) 
	// 						group by folio ORDER BY o.id";		

$query = mysqli_query($enlace, $sql);
$total = mysqli_num_rows($query);

$tabla = '
<table border="0" align="center" cellpadding="0" cellspacing="0" id="product-table" >
<!--<thead> -->
<tr>
<th class="anchoNum"><a href="#">#</a></th>
<th class="anchoFolio"><a href="#"> OFICIO </a></th>
<th class="anchoCarga"><a href="#"> CARGA ACUSES </a></th>
<th class="anchoProc"><a href="#"> PROCEDIMIENTO </a></th>
<th class="anchoFecha"><a href="#"> FECHA </a></th>
<th class="anchoDest"><a href="#"> DESTINATARIO</a></th>
<th class="anchoDep"><a href="#"> DEPENDENCIA </a></th>
<th class="anchoDep"><a href="#"> ASUNTO </a></th>
<th class="anchoDep"><a href="#"> ABOGADO SOLICITANTE </a></th>
<th class="anchoArea"><a href="#"> ÁREA </a></th>
<th class="anchoFirma"><a href="#"> FIRMA </a></th>
<th class="anchoObs"><a href="#"> OBSERVACIONES </a></th>
<th class="anchoStatus"><a href="#"> ESTATUS </a></th>
</tr>
<!-- </thead> -->
</table>
<div style="height:250px;width:100%;overflow:auto">
<table border="0" align="center" cellpadding="0" cellspacing="0" id="product-table" >
<tbody> 
';

	while($r = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		$estilo = "class='non'";
		
		//------------ MUESTRA FILAS LA FUNCION PROCESO PO SE ENCARGA DE ABRIR EL CUADRO Y CARGAR LA PAGINA ---------------
		if($r['state'] == 0) $txtStatus = " ";
		if($r['state'] == 1) $txtStatus = " ";
		if($r['state'] == 2) $txtStatus = " ";
		
		//---------- vemos si esta en archivos ---------------------//
		if($r['Folio'] == "") $folio = $r['idFol'];
		
		$folioOf = $r['Folio']; 	//Aquí se almacena el Oficio con el Formato Original ($folioOf)
		$folioF = cadenaSinEspeciales($folioOf);
		$folioOk = str_replace("/","!",$folioF); //Aqui se transforma el No. de oficio a un formato especial con signos de admiración (!) y se guarda en la variable: $folioOk

        //Esta funcion transforma el No. de Procedimiento a un formato especial con signos de admiración (!) y se guarda en la variable: $folioOk
		$procedimiento = $r['procedimiento'];
		$procedimientoF = cadenaSinEspeciales($procedimiento);
		

        $sql0 = "SELECT * FROM archivos WHERE oficioDoc = '".$folioOk ."' ";
		$z = mysqli_query($enlace, $sql0); //pasas la query a la conexion
        $ofi = mysqli_fetch_array($z,MYSQLI_BOTH);
		$idOficio = $r['id']; //***************Este es el Id que identifica cada Oficio******************
                      
        if ($ofi != 0) {
        	$linkSubirArchivo = "";
			$status = 'CARGADO';
        	$linkSubirArchivo2 = '<a href="#" title="Remplazar Archivo" onclick=\'new mostrarCuadro(300,400,"Remplazar archivo",70,"cont/pfrr_oficio_subir2.php","idOficio='.$idOficio.'&procedimiento='.$procedimientoF.'&folio='.$folioF.'")\' >  <img src="images/page_16_remove.png" /> </a>';
		}
		else  {
			$linkSubirArchivo2 = "";
			$status = 'PENDIENTE';
			$linkSubirArchivo = '<a href="#" title="Subir Archivo" onclick=\'new mostrarCuadro(300,400,"Subir archivo",70,"cont/pfrr_oficio_subir.php","idOficio='.$idOficio.'&procedimiento='.$procedimientoF.'&folio='.$folioF.'")\'>  <img src="images/Upload.png" /> </a>';
		      }
			  
			  //---------- Aquí se imprimen las columnas de la Tabla Oficios---------------------//
		$tabla .= '
				<tr '.$estilo.' >
				    <td class="ofiNum">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['id']).'</td>
					<td class="ofiFolio">'.$txtStatus.' '.verificaOficioLink($folioOf).'</td> 
					<td class="ofiCarga"> '.$linkSubirArchivo.''.$linkSubirArchivo2.' </td>
					<td class="ofiProc">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['procedimiento']).'</td>
					<td class="ofiFecha">'.fechaNormal($r['fecha_oficio']).'</td>
					<td class="ofiDest">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['destinatario']).'</td>
					<td class="ofiDep">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['dependencia']).'</td>
					<td class="ofiDep">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['asunto']).'</td>
					<td class="ofiSoli">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['abogado_solicitante']).'</td>
					<td class="ofiArea">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['nivel']).'</td>
					<td class="ofiFirma">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['firma_oficio']).'</td>
					<td class="ofiObs">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['observaciones']).'  </td>
					<td class="ofiStatus">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$status).'</td>
                
                    <!-- <a href="#" title="Ver Informacion" onclick=\'new mostrarCuadro(500,700,"Información del Oficio",70,"cont/pfrr_oficio_notifica2.php","id='.$r['id'].'&abogado='.$r['abogado_solicitante'].'&folio='.$folioOk.'")\' >  <img src="images/ver_informacion.png"> </a>	-->
				</tr>';
			}
		$tabla .= '
				</tbody>
				</table>
				</div>
				';
	         //---------- Aquí termina el código que imprime las columnas de la Tabla de Oficios---------------------//

	if($total == 0) $tabla = "<center><br><br><br><br><h3> No se encontraron oficios </h3><br><br><br></center>";
	echo $tabla;
    //mysql_free_result($sql);	
	mysqli_free_result($query);
	mysqli_close($enlace)
?>

