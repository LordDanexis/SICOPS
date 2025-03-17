<?php
session_start();
include("includes/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SICOPS</title>
	<LINK REL="shortcut icon" HREF="legal4.ico">
	<link rel="stylesheet" href="css/estilo1234y.css" type="text/css" media="screen" title="default" />
	<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/menu.js"> </script>
	<script type="text/javascript" src="js/funciones.js"> </script>
	<script type="text/javascript" src="js/ajax.js"> </script>
</head>

<body id="login-bg">

	<div id="login-holder">
		<div id="logo-login">
			<div id='sagap'>
				<a href="index.php">
					<div id='logoSis'><img src="images/logoasfok.png" alt="" /></div>
					<div id='nombre'>SICOPS <span class='nomSis'> DGSUB </span></div>
					<div id='texto'> (Sistema de Consulta y Organización para Substanciación) </div>
				</a>
			</div>
		</div>

		<div class="clear"></div>

		<div id="loginbox">
			<div id="login-inner">
				<form onkeypress="if(event.keyCode == 13) login()">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<th>Usuario:</th>
							<td><input type="text" class="login-inp" id='user' /></td>
						</tr>
						<tr>
							<th>Contraseña: </th>
							<td><input type="password" class="login-inp" id='pass' value="*********" onfocus="this.value=''" /></td>
						</tr>
						<tr>
							<th></th>
							<td valign="top">&nbsp; <span id='r'></span><span id='r2'></span></td>
						</tr>
						<tr>
							<th></th>
							<td><input type="button" class="submit-login" value="Ingresar" id='ingresa' onclick="login()" /></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="clear"></div>
			<a href="" class="forgot-pwd">¿Olvidó su contraseña?</a>
		</div>
	</div>
</body>

</html>