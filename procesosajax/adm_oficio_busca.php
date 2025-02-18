<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-Type: text/html;charset=utf-8");

require_once("../includes/clases.php");
require_once("../includes/funciones.php");
$conexion = new conexion;
$conexion->conectar();
//-------------------------- DESINFECTAR VARIABLES -----------------------------
//------------------------------------------------------------------------------
$texto = valorSeguro(trim($_REQUEST['texto']));
$usuario = valorSeguro(trim($_REQUEST['usuario']));
$direccion = valorSeguro(trim($_REQUEST['direccion']));
$nivel = valorSeguro(trim($_REQUEST['nivel']));
//if ( $nivel == "S" ) { $nivel = $_REQUEST["direccion"];}

if($direccion == "DG" || $nivel == "S")
{
							
	$sql = $conexion->select("SELECT * FROM oficios 
								WHERE
								
									folio LIKE '%".$texto."%' OR
									procedimiento LIKE '%".$texto."%' OR 
									destinatario LIKE '%".$texto."%' OR 
									dependencia LIKE '%".$texto."%' OR 
									observaciones LIKE '%".$texto."%'
								
								ORDER BY id desc Limit 50
							",false);
}
else
{
	$sql = $conexion->select("SELECT * FROM oficios 
								WHERE
									abogado_solicitante = '".$usuario."' AND 
									(
										procedimiento LIKE '%".$texto."%' OR 
										destinatario LIKE '%".$texto."%' OR 
										dependencia LIKE '%".$texto."%' OR 
										observaciones LIKE '%".$texto."%' OR 
										folio LIKE '%".$texto."%' 
									) AND( 
								tipo = 'archivo' OR
								tipo = 'administracion'
								)
									ORDER BY id desc Limit 50
							",false);
}
						
$total = mysql_num_rows($sql);

$tabla = '

	<table  border="0" align="center" cellpadding="0" cellspacing="0" id="product-table" >
		<tr>
			<th class="ancho200"><a href="#">Folio</a>	</th>
			<th class="ofiFecha"><a href="#">Fecha</a>	</th>
			<th class="ofiLeyenda"><a href="#">Acciones</a>	</th>
			<th class="ofiLeyenda"><a href="#">Destinatario</a></th>
			<th class="ofiLeyenda"><a href="#">Dependencia</a></th>
			<th class="ofiLeyenda"><a href="#"> Oficio referencia </a></th>
			<th class="ofiOfi"><a href="#"> Status </a></th>
			<!--
			<th class="ofiOfi"><a href="#"> Modificar </a></th>
			-->
		</tr>
	</table>
	<div style="height:250px;width:100%;overflow:auto">
	<table  border="0" align="center" cellpadding="0" cellspacing="0" id="product-table" >
	<tbody>
	';

	while($r = mysql_fetch_array($sql))
	{
		$i++;
		$res = $i%2;
		if($res == 0) $estilo = "class='non'";
		else $estilo = "class='par'";
		
		//------------ MUESTRA FILAS LA FUNCION PROCESO PO SE ENCARGA DE ABRIR EL CUADRO Y CARGAR LA PAGINA ---------------
		if($r['status'] == 0) $txtStatus = "<b style='color:red'>CANCELADO</b>";
		if($r['status'] == 1) $txtStatus = "<b style='color:#C4C400'>PENDIENTE</b>";
		if($r['status'] == 2) $txtStatus = "<b style='color:GREEN'>NOTIFICADO</b>";
		
		if($r['folio'] == "") $folio = $r['id'];
		else $folio = $r['folio'];
		
		$acciones = str_ireplace("|","<br>",$r['procedimiento']);
		$tabla .= '
				<tr '.$estilo.' onclick=\'new mostrarCuadro(500,600,"Información del Oficio",70,"cont/adm_oficio_notifica.php","id='.$r['id'].'&abogado='.$r['abogado_solicitante'].'&folio='.$r['folio'].'&muestra=1")\'>
					<td class="ancho200">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$folio).'</td>
					<td class="ofiFecha">'.fechaNormal($r['fecha_oficio']).'</td>
					<td class="ofiLeyenda">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$acciones).'</td>
					<td class="ofiLeyenda">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['destinatario']).'</td>
					<td class="ofiLeyenda">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['dependencia']).'</td>
					<td class="ofiLeyenda">'.str_ireplace($texto,'<span class="b">'.$texto.'</span>',$r['observaciones']).'  </td>
					<td class="ofiOfi">'.$txtStatus.'</td>
					<!--
					<td class="ofiAccion">
					
						<a href="#" title="Ver Informacion" class="icon-5 info-tooltip" onclick=\' new mostrarCuadro(450,800,"Volante de Correpondencia",70,"cont/vol_volante.html.php","id='.$r['id'].'&muestra=1") \'></a>
						<a href="#" title="Modificar" class="icon-1 info-tooltip" onclick=\' new mostrarCuadro(550,800,"Modificar Volante '.$r['folio'].'",60,"cont/vol_edita_volantes.php","id='.$r['id'].'&muestra=1") \'></a> 
					</td>
					-->						
				</tr>';
	}
		$tabla .= '
				</tbody>
				</table>
				</div>
				';
	
	if($total == 0) $tabla = "<center><br><br><br><br><h3> No se encontraron oficios </h3><br><br><br></center>
	";
	
	echo $tabla;

mysql_free_result($sql);
?>

