<?php
include 'controlador/welcome.controlador.php';

$obj = new WelcomeControlador();

if (!isset($_SESSION["id_usuario"]) && !isset($_SESSION["estado"]) == 1)
	{ header("Location: index.php"); }

$sql = $obj->saludoApp();

$row = $sql;

foreach ($sql as $row) { ; }

$sql1 = $obj->saludoApp2();

$ro = $sql1;

foreach ($sql1 as $ro) { ; }
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="imagenes/mi.png" type="image/x-icon">
	<title>MIKEBOL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
	<link rel="stylesheet" href="Estilos/estilos/fontello.css">
	<link rel="stylesheet" href="Estilos/estilos/estilos.css">
	<!--<link rel="stylesheet" href="Estilos/css/bootstrap.css">-->
	<script src="https://use.fontawesome.com/e622d3b53e.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<!-- Administrador -->

	<?php if ($_SESSION['tipousuario'] == 1) {?>

	<header>
		<div class="contenedor">
			<h1><img id="logo" src="imagenes/logo.ico">MIKEBOL</h1>
			<input type="checkbox" id="menu-bar">
			<label class="icon-menu" for="menu-bar"></label>
			<nav class="menu">
				<a href="vista/index.php" id="modal-nav">CRUD</a>
				<a href="#" id="modal-nav">Planilla</a>
				<a href="#" id="modal-nav">Perfil</a>
				<a href="logout.php" id="modal-nav">Cerrar Sesión</a>
			</nav>
		</div>
	</header>

	<section id="banner">
		<div class="contendeor">
			<h1 class="titulo-mikebol"><marquee BGcolor="#FFF" direction=left><img src="imagenes/logo3.png" width="70" height="70" scrolldelay="1"><?php echo "BIENVENIDO ADMINISTRADOR " . $ro->nombres . " " . $ro->apellidos . " " . "A MIKEBOL" ?><img src="imagenes/logo3.png" width="70" height="70"> </marquee></h1>
		</div>
	</section>

	<?php include 'mikebol/noticias.php'; 

	include	'mikebol/tablaposiciones.php' ?>



	<section id="Redes">
		<a class="icon-facebook" href="https://www.facebook.com/jairoarturo.cifuentes" target="_blank"></a>
		<a class="icon-instagram" href="https://www.instagram.com/jacifuentes521/" target="_blank"></a>
		<?php include'Redes/gmail.php';?>
	</section>

	<footer>
		<div>
			<p>MIKEBOL JCYML copyright © <?=date('Y'); ?></p>
		</div>
	</footer>
	
	<?php }?>
	

	<!--Instructor-->

	<?php if ($_SESSION['tipousuario'] == 2) {?>

	<h1><?php echo "BIENVENIDO Instructor " . $ro->nombres . " " . $ro->apellidos . " " . "A MIKEBOL" ?></h1>

	<br />
	<h1>SOY Instructor</h1>

	<br />
	<a href="logout.php">Cerrar Sesión</a>

	<?php }?>

	<!--Capitan-->

	<?php if ($_SESSION['tipousuario'] == 3) {?>

	<h1><?php echo "BIENVENIDO capitan " . $row->nombres . " " . $row->apellidos . " " . "A MIKEBOL" ?></h1>

	<br />
	<h1>SOY capitan</h1>

	<br />
	<a href="logout.php">Cerrar Sesión</a>

	<?php }?>

	<!--Jugador-->

	<?php if ($_SESSION['tipousuario'] == 4) {?>

	<h1><?php echo "BIENVENIDO Jugador " . $row->nombres . " " . $row->apellidos . " " . "A MIKEBOL" ?></h1>

	<br />
	<h1>SOY jugador</h1>

	<br />
	<a href="logout.php">Cerrar Sesión</a>

	<?php }?>

</body>
</html>