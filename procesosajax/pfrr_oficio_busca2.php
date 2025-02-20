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
// $nivel = ivalorSeguro($enlace, $_REQUEST['nivel']);
// $nivel = valorSeguro(trim($_REQUEST['nivel']));
//$idOficio = valorSeguro(trim($_REQUEST['id_oficio']));

// if($nivel == "DG")
// {	
	$sql = "SELECT *,
	                           o.folio Folio,
							   o.id,
							   o.tipo idFol,
							   o.status as state  
	                     FROM oficios o
								WHERE 
								(   
									folio LIKE '%".$texto."%' OR 
								    procedimiento LIKE '%".$texto."%' OR
									fecha_oficio LIKE '%".$texto."%' OR  
									consecutivo LIKE '%".$texto."%' OR
									destinatario LIKE '%".$texto."%' OR 
									observaciones LIKE '%".$texto."%' OR 
									asunto LIKE '%".$texto."%' OR 
									Folio LIKE '%".$texto."%' OR
									id LIKE '%".$texto."%' AND
									nivel = 'A.2'
								) 
							group by folio ORDER BY o.id";	
// }
// else 
// {
// 	$sql = $conexion->select("SELECT *,o.folio Folio,o.id,o.tipo idFol,o.status as state  FROM oficios o
// 							  INNER JOIN usuarios u
// 							  ON o.abogado_solicitante = u.usuario
// 							  WHERE
							
// 								(
// 									folio LIKE '%".$texto."%' OR 
// 								    procedimiento LIKE '%".$texto."%' OR
// 									fecha_oficio LIKE '%".$texto."%' OR  
// 									consecutivo LIKE '%".$texto."%' OR
// 									destinatario LIKE '%".$texto."%' OR 
// 									dependencia LIKE '%".$texto."%' OR 
// 									observaciones LIKE '%".$texto."%'
// 								) 
// 							group by folio ORDER BY o.id",false);
// }
					

$query = mysqli_query($enlace, $sql);
$total = mysqli_num_rows($query);

$tabla = '
<table border="0" align="center" cellpadding="0" cellspacing="0" id="product-table" >
<!--<thead> -->
<tr>
<th class="anchoNum"><a href="#">#</a></th>
<th class="anchoFolio"><a href="#">Folio </a></th>
<th class="anchoCarga"><a href="#"> Carga Acuses </a></th>
<th class="anchoProc"><a href="#">Procedimiento </a></th>
<th class="anchoFecha"><a href="#">Fecha </a></th>
<th class="anchoDest"><a href="#">Destinatario </a></th>
<th class="anchoDep"><a href="#">Dependencia </a></th>
<th class="anchoDep"><a href="#">Asunto </a></th>
<th class="anchoDep"><a href="#">Abogado Solicitante</a></th>
<th class="anchoArea"><a href="#"> Área </a></th>
<th class="anchoObs"><a href="#"> Observaciones </a></th>
<th class="anchoStatus"><a href="#"> Estatus </a></th>
</tr>
<!-- </thead> -->
</table>
<div style="height:250px;width:100%;overflow:auto">
<table border="0" align="center" cellpadding="0" cellspacing="0" id="product-table" >
<tbody> 
';

	//while($r = mysql_fetch_array($sql))
	while($r = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		// $i++;
		// $res = $i%2;
		// if($res == 0) $estilo = "class='non'";
		// else 
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
		
		// $sqlO = $conexion->select("SELECT * FROM archivos WHERE oficioDoc = '".$folioOk ."' ",false);
		// $ofi = mysql_fetch_array($sqlO);
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
			// $linkSubirArchivo = '<a href="#" title="Subir Archivo" onclick=\'new mostrarCuadro(300,400,"Subir archivo",70,"cont/pfrr_oficio_subir.php","folio='.$folioOk.'")\' >  <img src="images/Upload.png" /> </a>';
			$linkSubirArchivo = '<a href="#" title="Subir Archivo" onclick=\'new mostrarCuadro(300,400,"Subir archivo",70,"cont/pfrr_oficio_subir.php","idOficio='.$idOficio.'&procedimiento='.$procedimientoF.'&folio='.$folioF.'")\'>  <img src="images/Upload.png" /> </a>';
		      }

			  //---------- Saca el nombre del Usuario, y el Nivel---------------------//
			  $abogado = $r['abogado_solicitante'];
			//   $users = $conexion->select("SELECT nombre,nivel FROM usuarios WHERE usuario = '".$r['abogado_solicitante']."' ",false);
			//   $userF = mysql_fetch_array($users);
			  $users = "SELECT nombre,nivel FROM usuarios WHERE usuario = '".$r['abogado_solicitante']."' ";
			  $a = mysqli_query($enlace, $users); //pasas la query a la conexion
			  $userF  = mysqli_fetch_array($a,MYSQLI_BOTH);
			  $nombre = $userF['nombre'];
			  $nivel  = $userF['nivel'];
			  //---------- Termina el Query para sacar el Nombre del Usuario y el Nivel---------------------//
			  
			  //---------- Aquí se imprimen las columnas de la Tabla Oficios---------------------//
			  $destinatario = $r['destinatario'];
		$tabla .= '
				<tr '.$estilo.' >
				    <td class="ofiNum">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['id']).'</td>
					<td class="ofiFolio">'.$txtStatus.' '.verificaOficioLink($folioOf).'</td> 
					<td class="ofiCarga"> '.$linkSubirArchivo.''.$linkSubirArchivo2.' </td>
					<td class="ofiProc">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['procedimiento']).'</td>
					<td class="ofiFecha">'.fechaNormal($r['fecha_oficio']).'</td>
					<td class="ofiDest">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$destinatario).'</td>
					<td class="ofiDep">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['dependencia']).'</td>
						<td class="ofiDep">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['asunto']).'</td>
					<td class="ofiSoli">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$nombre).'</td>
					<td class="ofiArea">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$nivel ).'</td>
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

