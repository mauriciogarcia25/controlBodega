<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Control Bodega</title>
	<link rel="stylesheet" type="text/css" href="estilos/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="estilos/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="estilos/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="estilos/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilos/signin.css">
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
<div id="container">
	<div class="container">
		<form class="form-signin">
			<h2 class="form-signin-heading">CONTROL BODEGA</h2>
			<label for="inputEmail" class="sr-only">Usuario</label>
			<input type="email" class="form-control" id="user" placeholder="Usuario" requiered autofocus>
			<label for="inputPassword" class="sr-only">Contraseña</label>
			<input type="password" class="form-control" id="pass" placeholder="Contraseña" requiered>
			<button class="btn btn-lg btn-primary btn-block" id="btningresar" type="submint">Ingresar</button>
		</form>
	</div><!-- /container -->
</body>
</html>