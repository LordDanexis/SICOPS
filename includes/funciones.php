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
//-------------------------------------------------- URL -------------------------------------------------------
function quitar_espaciales($cadena)
{
	$no_permitidas = array("�", "á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
	$permitidas = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
	$texto = str_replace($no_permitidas, $permitidas, $cadena);
	return $texto;
}
//-------------------------------------------------- MENU -------------------------------------------------------
//-------------------------------------------------- MENU -------------------------------------------------------
function menu($direccion, $nivel, $soloReportes)
{
	if ($direccion == "A" || $direccion == "DG"  || $direccion == "AP") {


		$menu = '
				<ul class="select menu" id="mInicio">
				
				<!-- <li><a href="#nogo" class="munuSup"><b>Folio de Servicio </b><!--[if IE 7]><!--></a><!--<![endif]-->
			
					<ul class="submenu redonda5 ulPo">';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_po redonda3" href="?cont=ayuda_po"> <img src="images/FAQ.png" />Ticket</a></li>';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_po redonda3" href="?cont=po_escritorio"> <img src="images/pliego_po.png" /> Ver Acciones </a></li>';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_po redonda3" href="?cont=po_oficios"> <img src="images/volantes.png" /> <span>Oficios PO</span> </a></li>';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<!-- <li><a class="menu_po redonda3" href="?cont=dg_mantenimiento"> <img src="images/volantes.png" /> <span>Oficios PO</span> </a></li> -->';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_po redonda3" href="?cont=po_busqueda&reports=' . $soloReportes . '"> <img src="images/search16.png" />Búsqueda Avanzada</a></li>';
		if ($direccion == "AP") $menu .= '<li><a class="mSetup redonda3" href="?cont=dg_bajasAnunciadas"> <img src="images/page_16_remove.png" /> Bajas Anunciadas </a></li>';
		$menu .= '
				</ul>
				<!--[if lte IE 6]></td></tr></table></a><![endif]-->
				
				</ul>
				
				<div class="nav-divider">&nbsp;</div>
				';
	} 
 
	if ($direccion == "A"  || $direccion == "DG" || $direccion == "AP") {
		$menu .= '<ul class="select menu" id="mInicio"> <li><a href="#nogo" class="munuSup"><b>Oficios DGSUB</b><!--[if IE 7]><!--></a><!--<![endif]-->
				<!--[if lte IE 6]><table><tr><td><![endif]-->
    <ul class="sub submenu redonda5 ulPfrr">';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="?cont=pfrr_escritorio"> <img src="images/pliego_pfrr.png" /> <span> Ver Acciones </span></a></li>';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="?cont=frLista"> <img src="images/pliego_pfrr.png" /> <span> Ver Prescripciones </span></a></li>';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="?cont=frListaVencimiento1"> <img src="images/pliego_pfrr.png" /> <span> Fecha Judicial </span></a></li>';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="?cont=frListaVencimiento"> <img src="images/pliego_pfrr.png" /> <span> Ver Vencimiento (90 Días)</span></a></li>';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_pfrr redonda3" href="?cont=pfrr_oficios3"> <img src="images/volantes.png" /> <span>Alta Oficio </span> </a></li>'; //*********GENERA OFICIOS********** */
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="?cont=presuntosLista"><img src="images/presuntos.png" /> <span>Presuntos Responsables</span></a></li>';

		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="?cont=pfrr_busqueda&reports=' . $soloReportes . '"><img src="images/search16.png" /><span>Búsqueda Avanzada</span></a></li>';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="?cont=ayuda_pfrr"><img src="images/faqpfrr.png" /> <span>Ticket</span></a></li>';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="busquedaO/oficiosB.php"> <img src="images/volantes.png" /> <span>Búsqueda de Oficios  </span> </a></li>'; //*********BUSCA OFICIOS PHP 8.2.12********** */
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="indicadores/dist/controlPFRR.php"> <img src="images/volantes.png" /> <span>Indicadores</span> </a></li>';
		if ($soloReportes != 1 and $direccion == "AP") $menu .= '<li><a class="menu_pfrr redonda3" href="entidad/dist/controlEntidad.php"> <img src="images/volantes.png" /> <span>Información por Entidad</span> </a></li>';


		$menu .= '	</ul>
				<!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
				</ul>';
	}

	if ($direccion == "AP") {
		$menu .= '
					<div class="nav-divider">&nbsp;</div>
					
					<ul class="select menu" id="mInicio">
						<li><a href="#" class="munuSup"><b>Medios Impugnación</b><!--[if IE 7]><!--></a><!--<![endif]-->
							<!--[if lte IE 6]><table><tr><td><![endif]-->
								<ul class="sub submenu redonda5 ulMd">';

		if ($direccion == "AP")

			$menu .= '
									<li><a class="menu_md redonda3" href="presuntosW/dist/lista.php"> <img src="images/add.png" /> <span> Alta JN, AI, RR (Responsables) </span> </a>
									<li> <a class="menu_md redonda3" href="a/dist/lista.php"> <img src="images/alta.png" /> Alta AD, RRF </a> </li>';

		$menu .= '					
			                        <li> <a class="menu_md redonda3" href="a_RRAI/dist/lista.php"> <img src="images/alta.png" /> Alta RRAI (Autoridad y Quejoso) </a> </li>
									<li> <a class="menu_md redonda3" href="jcaW/dist/lista.php"> <img src="images/pliego_po.png" /> Juicios Nulidad </a> </li>
									<li> <a class="menu_md redonda3" href="rf/dist/lista.php"> <img src="images/pliego_po.png" /> Recursos Revisón Fiscal </a> </li>
									<li> <a class="menu_md redonda3" href="ad/dist/lista.php"> <img src="images/pliego_po.png" /> Amparos Directos </a> </li>
									<li> <a class="menu_md redonda3" href="ai/dist/lista.php"> <img src="images/volantes.png" /> Amparos Indirectos </a> </li>	
									<li> <a class="menu_md redonda3" href="rrai/dist/lista.php"> <img src="images/pliego_po.png" /> Recurso de Revisión en AI </a> </li>									
									<li> <a class="menu_md redonda3" href="oficiosW/dist/lista.php"> <img src="images/vol_pfrr.png"/> Lista Oficios </a> </li>
				                    <!---- li> 
									<a class="menu_md redonda3" href="oficiosW/dist/lista-1.php"> <img src="images/vol_pfrr.png" /> Oficios 2020</a> </li>
				                    <li> <a class="menu_md redonda3" href="oficiosW/dist/lista-2.php"> <img src="images/vol_pfrr.png" /> Oficios 2021</a> </li>
				                    <li> <a class="menu_md redonda3" href="oficiosW/dist/lista-3.php"> <img src="images/vol_pfrr.png" /> Oficios 2022</a> 
									</li----->
									<li> <a class="menu_md redonda3" href="volantes/src/volantes.php"> <img src="images/doc_pink.png" /> Lista Volantes </a> </li>
									<li> <a class="menu_md redonda3" href="recursos/dist/lista.php"> <img src="images/pliego_po.png" /> Recursos Reconsideración </a> </li>
									<li> <a class="menu_md redonda3" href="#"> <img src="images/medio_actores_small.png" /> <span> Seguimiento Recurso de Reconsideración </span> </a>
										<ul class="submenu2 redonda5">
									<li> <a class="menu_md redonda3" href="?cont=medios_rr_actores"> <img src="images/actor.png" /> Ver Actores </a> </li>
									<li> <a class="menu_md redonda3" href="?cont=mediosrr_busqueda&reports=' . $soloReportes . '"> <img src="images/search16.png" /> Búsqueda Avanzada </a> </li>
											
										</ul>
									</li>

									<li><a class="menu_md redonda3" href="#"> <img src="images/excla_red.png" /> <span> Alertas </span> </a>
										<ul class="submenu2 redonda5">
										<li> <a class="menu_md redonda3" href="alertas/src/contestacion.php"> <img src="images/excla_red.png" /> Contestación Demanda </a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/suspension.php"> <img src="images/excla_red.png" /> Informe Suspensión</a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/reclamacion.php"> <img src="images/excla_red.png" /> Recurso Reclamación </a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/ampliacion.php"> <img src="images/excla_red.png" /> Ampliacion Demanda</a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/alegatos.php"> <img src="images/excla_red.png" /> Alegatos </a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/alegatos10.php"> <img src="images/excla_red.png" /> Alegatos 10 días </a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/alertaNulidad.php"> <img src="images/excla_red.png" /> Sentencia Nulidad</a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/alertaAdmisionAD.php"> <img src="images/excla_red.png" /> Admisión Amparo Directo</a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/alertaRequerimientoAD.php"> <img src="images/excla_red.png" /> Requerimiento Amparo Directo</a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/alertaRecursorevAD.php"> <img src="images/excla_red.png" /> Recurso de Revisión en Amparo Directo</a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/requerimiento3.php"> <img src="images/excla_red.png" /> JN Requerimiento 3 días</a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/requerimiento5.php"> <img src="images/excla_red.png" /> JN Requerimiento 5 días</a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/requerimiento10.php"> <img src="images/excla_red.png" /> JN Requerimiento 10 días</a> </li>
										<li> <a class="menu_md redonda3" href="alertas/src/requerimiento15.php"> <img src="images/excla_red.png" /> JN Requerimiento 15 días</a> </li>
						
									</ul>
								</li>

									';
		$menu .= '</ul>
							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
						</li>
					</ul>';
	}

	if ($direccion == "AP") {
		$menu .= '
					<div class="nav-divider">&nbsp;</div>
					
					<ul class="select menu" id="mInicio">
						<li><a href="#nogo" class="munuSup"><b>Solicitud Aclaración</b><!--[if IE 7]><!--></a><!--<![endif]-->
							<ul class="sub submenu redonda5 ulOpi">';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_opi redonda3" href="?cont=opiniones_escritorio"> <img src="images/file_legal.png" /> <span> Ver SA </span> </a></li>';
		if ($soloReportes != 1) $menu .= '<li> <a class="menu_opi redonda3" href="?cont=opiniones_oficios"> <img src="images/doc_legal.png" /> Oficios </a> </li>';
		if ($soloReportes != 1) $menu .= '<li> <a class="menu_opi redonda3" href="?cont=sa_busqueda&reports=' . $soloReportes . '"> <img src="images/search16.png" />Búsqueda Avanzada</a></li>';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_opi redonda3" href="?cont=ayuda_opiniones"> <img src="images/FAQ.png" />Ticket</a></li>'; {

			$menu .= '</ul>
							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
						</li>
					</ul>';
		}
		$menu .= '</ul>
							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
						</li>
					</ul>';
	}

	if ($direccion == "AP") {
		$menu .= '
				<div class="nav-divider">&nbsp;</div>				
				<ul class="select menu" id="mInicio">
					<li><a href="#nogo" class="munuSup"><b>Reporte</b><!--[if IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]-->
						<ul class="sub submenu redonda5 ulRep">';

		$menu .= '<li><a class="menu_rep redonda3" href="' . damedominio() . '/dgr/indexdirx.php"> <img src="images/desktop.png" /> <span>Pantalla DG</span> </a> </li>';
		$menu .= '<li><a class="menu_rep redonda3" href="?cont=rep_reportesDG"> <img src="images/bar-chart-icon.png" /> <span>Reportes DG</span> </a> </li>';
		$menu .= '<li><a class="menu_rep redonda3" href="#"> <img src="images/report-icon0.png" /> <span>Reportes PO</span> </a>
										<ul class="submenu2 redonda5">
											<li><a class="menu_rep redonda3" href="?cont=rep_diario_comportamiento_po"> <img src="images/report-icon0.png" /> <span>PO CP2012</span> </a></li>
											<li><a class="menu_rep redonda3" href="?cont=rep_diario_comportamiento_po_2013"> <img src="images/report-icon0.png" /> <span>PO CP2013</span> </a></li>
											<li><a class="menu_rep redonda3" href="?cont=rep_po_trimestral"> <img src="images/report-icon.png" /> <span>PO Notificados CP2012</span> </a></li>
											<li><a class="menu_rep redonda3" href="?cont=rep_po_ejecutivo"> <img src="images/blue-document-table-icon.png" style="width:17px"/> <span>PO Informe Ejecutivo CP2012</span> </a></li>
											<li><a class="menu_rep redonda3" href="?cont=montos_modificados"> <img src="images/monto.png" /> <span>Diferencias Montos PO CP2012</span> </a></li>
											<li><a class="menu_rep redonda3" href="?cont=po_asistidos"> <img src="images/asistidos.png" /> <span>Pliegos Asistidos</span> </a></li>
											<li><a class="menu_rep redonda3" href="?cont=po_seguimiento"> <img src="images/asistidos.png" /> <span>Seguimiento</span> </a></li>
											
											<li><a class="menu_rep redonda3" href="?cont=rep_compdiario2014"> <img src="images/asistidos.png" /> <span>Comportamiento PO 2014</span> </a></li>
											
											<li><a class="menu_rep redonda3" href="?cont=po_reporte_not"> <img src="images/asistidos.png" /> <span>PO Notificados</span> </a></li>
										</ul>
									</li>';
		$menu .=  '<li><a class="menu_rep redonda3" href="#"> <img src="images/recuperaciones.png" width="14" height="16" /> <span>Reportes PFRR</span> </a>
										<ul class="submenu2 redonda5">
											<li><a class="menu_rep redonda3" href="?cont=historico_pfrr"> <img src="images/historico.png" /> <span>Historico de Resoluciones</span> </a></li>
											<li><a class="menu_rep redonda3" href="?cont=rep_acuerdos_inicio"> <img src="images/doc_pen14.png" /> <span>Acuerdos de Inicio</span> </a></li>
											<li><a class="menu_rep redonda3" href="?cont=rep_resoluciones_plazo"> <img src="images/doc-cal-days.png" width="14" height="16" /> <span>Resoluciones dentro de Plazo</span> </a></li>
											<!--li><a class="menu_rep redonda3" href="?cont=recuperaciones"> <img src="images/recuperaciones.png" width="14" height="16" /> <span>Reintegros</span> </a></li>
											<li><a class="menu_rep redonda3" href="?cont=semestral"> <img src="images/recuperaciones.png" width="14" height="16" /> <span>Semestral</span> </a></li--->
											<li><a class="menu_rep redonda3" href="?cont=emision_resoluciones"> <img src="images/Apps-preferences-system-time-icon.png" /> <span>Emisión de Resoluciones</span> </a></li>
										</ul>
									</li>';


		$menu .= '<li><a class="menu_rep redonda3" href="?cont=informe_estados"> <img src="images/presunto.png" /> <span>Informe por PR</span> </a></li>';
		$menu .= '<li><a class="menu_rep redonda3" href="?cont=desahogo"> <img src="images/presunto.png" /> <span>Informe para Jaime Alvarez</span> </a></li>';
		$menu .= '<li><a class="menu_rep redonda3" href="?cont=informe_entidad_po"> <img src="images/entidad.png" /> <span>Informe por Entidad PO</span> </a></li>';
		$menu .= '<li><a class="menu_rep redonda3" href="?cont=informe_entidad"> <img src="images/entidad.png" /> <span>Informe por Entidad PFRR</span> </a></li>';
		$menu .= '<li><a class="menu_rep redonda3" href="?cont=informe_respo"> <img src="images/entidad.png" /> <span>Informe por Resoluciones con Existencia</span> </a></li>';
	}

	$menu .= '</ul>
					<!--[if lte IE 6]></td></tr></table></a><![endif]-->
					</li>
				</ul>';

	if ($direccion == "AP") {
		$menu .= '
					<div class="nav-divider">&nbsp;</div>
					
					<ul class="select menu" id="mInicio">
						<li><a href="#nogo" class="munuSup"><b>Administración</b><!--[if IE 7]><!--></a><!--<![endif]-->
						<!--[if lte IE 6]><table><tr><td><![endif]-->
							<ul class="sub submenu redonda5 ulAdm" >';
		if ($soloReportes != 1 && $direccion != "AP") $menu .= '<li><a class="menu_adm redonda3" href="?cont=empleados"> <img src="images/presuntos.png" /> <span>Personal</span> </a></li>																
																<li> <a class="menu_adm redonda3" href="#"> <img src="images/organigrama.png" />Organigramas </a> 																
																<ul class="submenu2 redonda5">																	
																<li><a class="menu_rep redonda3" href="?cont=org"   > <img src="images/organigrama.png" /> <span>DGR</span> </a></li>	
											                    <li><a class="menu_rep redonda3" href="?cont=OrgaA" > <img src="images/organigrama.png" /> <span>Dirección A</span> </a></li>	
																<li><a class="menu_rep redonda3" href="?cont=OrgaB" > <img src="images/organigrama.png" /> <span>Dirección B</span> </a></li>	
																<li><a class="menu_rep redonda3" href="?cont=OrgaC" > <img src="images/organigrama.png" /> <span>Dirección C</span> </a></li>	
																<li><a class="menu_rep redonda3" href="?cont=OrgaD" > <img src="images/organigrama.png" /> <span>Dirección D</span> </a></li>																	
										                        </ul>                                                               																
																</li> ';

		if ($soloReportes != 1) $menu .= '<li><a class="menu_adm redonda3" href="?cont=adm_oficios_edicto"> <img src="images/volantes.png" /> <span>Oficios Edictos</span> </a></li>';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_adm redonda3" href="?cont=adm_oficios"> <img src="images/volantes.png" /> <span>Oficios Administración</span> </a></li>';
		if ($soloReportes != 1 && $direccion != "A") $menu .= '<li> <a class="menu_adm redonda3" href="?cont=empleados_alta"> <img src="images/alta.png" />Alta </a> </li>
																   <li> <a class="menu_adm redonda3" href="?cont=emp_busqueda&reports=' . $soloReportes . '"> <img src="images/search16.png" />Busqueda Empleados</a> </li>';


		$menu .= '</ul>
						<!--[if lte IE 6]></td></tr></table></a><![endif]-->
						</li>
					</ul>';
	}

	if ($direccion == "AP") {
		$menu .= '
					<div class="nav-divider">&nbsp;</div>
					<ul class="select menu" id="mInicio">
						<li><a href="#nogo" class="munuSup"><b>Volantes</b><!--[if IE 7]><!--></a><!--<![endif]-->
						<!--[if lte IE 6]><table><tr><td><![endif]-->
							<ul class="sub submenu redonda5 ulVol">';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_vol redonda3" href="?cont=vol_volantes_po"> <img src="images/doc_blue.png" /> <span>Volantes PO</span> </a></li>';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_vol redonda3" href="?cont=vol_volantes_pfrr"> <img src="images/vol_pfrr.png" /> <span>Volantes PFRR</span> </a></li>';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_vol redonda3" href="?cont=vol_volantes_legal"> <img src="images/doc_orange.png" /> <span>Volantes Legal Opinions</span> </a></li>';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_vol redonda3" href="?cont=vol_volantes_adm"> <img src="images/doc_pink.png" /> <span>Volantes Administration</span> </a></li>';
		if ($soloReportes != 1) $menu .= '<li><a class="menu_vol redonda3" href="?cont=vol_volantes_search"> <img src="images/search16.png" /> <span>Buscar Volantes</span> </a></li>';
		$menu .= '</ul>
							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
							</li>
						</ul>';
	}

	if ($direccion == "AP") {
		$menu .= '
								<div class="nav-divider">&nbsp;</div>	
								<ul class="select menu" id="mInicio">
									<li><a href="#" class="munuSup"><b>Requerimiento Autoridad</b><!--[if IE 7]><!--></a><!--<![endif]-->
										<!--[if lte IE 6]><table><tr><td><![endif]-->
										<ul class="sub submenu redonda5 ulPfrr">
											<li><a class="menu_pfrr redonda3" href="reqAutoridad/dist/volantes.php"> <img src="images/doc_orange.png" /> <span> Volantes, Oficios </span></a></li>
										</ul>
									</li>
								</ul>';
	}

	$menu .= '
					<ul class="select menu" id="mInicio">
						<!--[if lte IE 6]><table><tr><td><![endif]-->
							<ul class="sub submenu redonda5 ulVol">';
	$menu .= '</ul>
							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
							</li>
						</ul>';


	return $menu;
}

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
		$sql = "SELECT ifnull(max(consecutivo),0) + 1 as consecutivo, concat('DGSUB\"A\"/','" . "',lpad(ifnull(max(consecutivo),0) + 1,4,'0'),'/',year(now())) as folio FROM oficios";
		$q = mysqli_query($enlace, $sql);
		$r = mysqli_fetch_array($q, MYSQLI_BOTH);
		//$fechaPartes = explode("-", $fechaOficio);
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
		$sql = "SELECT ifnull(max(consecutivo),0) + 1 as consecutivo, concat('DGSUB\"A\"/','" . $dirForm . '/' . "',lpad(ifnull(max(consecutivo),0) + 1,4,'0'),'/',year(now())) as folio FROM oficios";
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