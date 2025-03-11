<?php
session_start();
if ($_SESSION['acceso'] != true && $_SESSION['adicom'] != true)	header("Location: login.php ");

header("Cache-Control: no-store, no-cache, must-revalidate");
date_default_timezone_set("America/Mexico_City");

include("includes/configuracion.php");
include("includes/funciones.php");
// $conexion = new conexion;
// $conn = $conexion->conectar();
//if(ESTADOSISTEMA == false)
//{
$sistemaCerrado = true;
$sistemaCorte = true;
//}else{
//	$sistemaCerrado = false;
//	$sistemaCorte = false; 
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ADICOM - Version Beta -</title>
	<LINK REL="shortcut icon" HREF="legal3.ico">
	<!-- <link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen" title="default" /> -->
	<link href="calendario/css/smoothness/jquery.ui.theme.css" rel="stylesheet">
	<link href="calendario/css/smoothness/jquery-ui.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="css/base.css" type="text/css" /> -->
	<!-- <link rel="stylesheet" href="css/smoothness/jquery-ui-1.8.4.custom.css" type="text/css" /> -->
	<!--  jquery core -->
	<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<!--  checkbox styling script -->
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/ajaxMisa.js"></script>
	<script type="text/javascript" src="js/ajaxConfiguracion.js"></script>
	<script type="text/javascript" src="calendario/js/jquery-ui-1.10.3.custom.js"></script>
	<script>
		//--------------- cambia calendario a Español y desabilita dias que se configuren ------------------------------------------
		jQuery(function($) {
			$.datepicker.regional['es'] = {
				closeText: 'Cerrar',
				prevText: '&#x3c;Ant',
				nextText: 'Sig&#x3e;',
				currentText: 'Hoy',
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado'],
				dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mi&eacute;', 'Juv', 'Vie', 'S&aacute;b'],
				dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S&aacute;'],
				weekHeader: 'Sm',
				dateFormat: 'dd/mm/yy',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: ''
			};
			$.datepicker.setDefaults($.datepicker.regional['es']);
		});
		///----------------------------------------------------------------
	</script>
</head>

<body>
	<?php
	echo cuadroYfondo();
	echo cuadroYfondo2();
	echo cuadroYfondo3();
	?>
	<!-- ----------------------------------------- ----------------------------------------------->
	<!-- ---------------------------- IMPORTANTE NO QUITAR --------------------------------------->
	<!-- --------------------- VARIABLES QUE PASAN VALORES A JQUERY ------------------------------>
	<!-- ----------------------------------------- ----------------------------------------------->
	<input name="indexUser" type="hidden" value="<?php echo  $_SESSION['usuario'] ?>" id="indexUser" />
	<input name="indexDir" type="hidden" value="<?php echo $_SESSION['direccion'] ?>" id="indexDir" />
	<input name="indexNivel" type="hidden" value="<?php echo $_SESSION['nivel'] ?>" id="indexNivel" />
	<!-- ----------------------------------------- ----------------------------------------------->
	<!-- ----------------------------------------- ----------------------------------------------->
	<!-- ----------------------------------------- ----------------------------------------------->
	<!-- ----------------------------------------- ----------------------------------------------->

	<!-- <input type="text" name="usuarioActual" id="usuarioActual" value="<?php echo $_SESSION['usuario'] ?>" /> -->
	<!-- Start: page-top-outer -->
	<div id="page-top-outer" style="position:relative">
		<!-- Start: page-top -->
		<div id="page-top">

			<div id='sagap'>
				<a href="index.php">
					<div id='logoSis'><img src="images/logo.png" alt="" /></div>
					<div id='nombre'>DGSUB <span class='nomSis'> / SICOPS / <?php 	//echo date("H:i:s"); 
																			?></span></div>
					<div id='texto'>SICOPS (Sistema de Consulta y Organización para Substanciación)</div>
				</a>
			</div>
			<div id="logo">
				<a href="index.php"><img src="images/logoasfok.png" alt="" /></a>
			</div>
			<!-- end logo -->
		</div>
		<!-- End: page-top -->
	</div>
	<!-- End: page-top-outer -->

	<div class="clear">&nbsp;</div>

	<!--  start nav-outer-repeat................................................................................................. START -->
	<div class="nav-outer-repeat">
		<!--  start nav-outer -->
		<div class="nav-outer">

			<!-- start CUENTA Y CERRAR -->
			<div id="nav-right" style="position:relative; z-index:100">
				<div class="showhide-account">
					<div class="div1"> </div>

					<ul class="setup div2" id="setup">
						<li><img src="images/user_sistem.png" />
							<ul class="submenuSetup redonda5">
								<!--  -->
								<?php
								echo "<li style='line-height:normal;margin:5px 0; padding:10px '>";
								echo "<div>";
								echo "<b>" . $_SESSION['nombre'] . "</b><br>";
								echo "Usuario: " . $_SESSION['usuario'] . "<br>";
								echo "Direccion: " . $_SESSION['direccion'] . "<br>";
								echo "Nivel: " . $_SESSION['nivel'] . "<br>";
								echo "</div>";
								echo "</li>";
								?>
								<?php

								$url = "http://" . $_SERVER['HTTP_HOST'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
								protPhantom();
								if (stripos($url, "prueba") !== false) $carpeta = "prueba";
								else  $carpeta = "adicom";

								echo '<li><a class="mSetup redonda3" href="#"  onclick=\' new mostrarCuadro(600,1000,"Estados de Trámite ADICOM",20,"cont/estados_tramite.php","") \'> <img src="images/listNum.png" /> Estados de Trámite</a></li>';
								//echo '<li><a class="mSetup redonda3" href="http://'.$_SERVER['HTTP_HOST'].'/'.$carpeta.'/reportes2" target="_blank"> <img src="images/bar-chart-icon.png" /> Reportes</a></li>'; 
								if ($_SESSION['direccion'] == "DG") {
									echo '<li><a class="mSetup redonda3" href="?cont=configuracion"> <img src="images/config.png" /> Configurar Sistema</a></li>';
								}
								?>
								<li><a class="mSetup redonda3" href="procesosAjax/ajax_login_cerrar.php"> <img src="images/Exit.png" /> Cerrar Sesión </a></li>
							</ul>
						</li>
					</ul>
				</div>


			</div>
			<!-- end nav-right -->


			<!--  start nav -->
			<div class="nav">
				<div class="table menuSup">
					<?php
					if ($sistemaCerrado && $_SESSION['nivel'] != 'DG')
						echo menu($_SESSION['direccion'], $_SESSION['nivel'], $soloReportes = 1);
					else
						echo menu($_SESSION['direccion'], $_SESSION['nivel'], $soloReportes = 0);
					?>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<!--  start nav -->

		</div>
		<div class="clear"></div>
		<!--  start nav-outer -->
	</div>
	<!--  start nav-outer-repeat................................................... END -->

	<div class="clear"></div>

	<!-- start content-outer -->
	<div id="content-outer">
		<!---------------------------------- start content ---------------------------------------->
		<div id="content" class="redonda10 sombra">
			<?php
			// comprobamos el sistema donde trabajamos
			$url = "http://" . $_SERVER['HTTP_HOST'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
			if (stripos($url, "prueba") !== false) echo "
		
            <div id='message-red' style='position:fixed; top:10px; left:400px; z-index:1000000'>
                <table border='0' width='100%' cellpadding='0' cellspacing='0'>
                    <tr>
                        
                    </tr>
                </table>
            </div>
		";

			//verifica que no este cerrado el sistema
			//echo "EDO SIS ".
			$edoSystem = @estadoSistema();
			if ($_REQUEST['cont'] == 'configuracion') {
				include('cont/' . $_REQUEST['cont'] . '.php');
			} else {
				if (!$sistemaCerrado) {
					if (isset($_REQUEST['cont']))
						include('cont/' . $_REQUEST['cont'] . '.php');
					elseif ($_SESSION['acceso'] == true) include('cont/inicio.php');
					else
						echo "No se cargo contenido...";
				} else {
					//include('cont/config_mensaje.php');
					if (isset($_REQUEST['cont']))
						include('cont/' . $_REQUEST['cont'] . '.php');
					elseif ($_SESSION['acceso'] == true) {
						if ($sistemaCerrado && !$sistemaCorte) include('cont/dg_mantenimiento.php');
						if ($sistemaCerrado && $sistemaCorte) include('cont/dg_suspension.php');
					} else
						echo "No se cargo contenido...";
				}
			}
			//si esta cerrado
			?>
		</div>
		<!---------------------------------------  end content ------------------------------------>
		<div class="clear">&nbsp;</div>
	</div>
	<!--  end content-outer -->

	<!-- start footer -->
	<div id="footer">
		<!--  start footer-left -->
		<div id="footer-left">
			<img src="images/logo.png" width="15" /> &nbsp; DGR. &reg; Todos los derechos reservados. .
		</div>
		<!--  end footer-left -->
	</div>
	<!-- end footer -->
</body>

</html>
<?php mysql_close(); ?>