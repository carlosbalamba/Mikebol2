<!--<?php

	if (!isset($_SESSION["id_usuario"])) 
		{ header("Location: ../../index.php"); }
?>-->

<!DOCTYPE html>
<html>
	<head>
		<link href="imagenes/mi.png" rel="shortcut icon" type="image/x-icon">
		<title>Noticias</title>
		<link rel="stylesheet" type="text/css" href="Estilos/estilos/noticias.css">
	</head>
	<body>
		<img src="imagenes/patriotas.jpg" id="img-patriotas">
		<p id="a">Patriotas sorprendió en el</p>
		<p id="b">Metropolitano: venció 3-2 al Junior</p>
		<p id="c">Actualizado hace 32 minutos</p>
		<p id="d">Dos penaltis, por errores del local, hicieron que los</p>
		<p id="e">'atezados' remontaran en el CEET.</p>

		<p id="f">_____________________________________________________________________________________</p>

		<img src="imagenes/chico.png" id="img-chico">
		<p id="g">Los jugadores del Chico y una voz de</p>
		<p id="h">aliento para Darwin Quintero</p>
		<p id="i">Actualizado hace 3 horas</p>
		<p id="j">Este jueves, antes del partido contra Millonarios, el</p>
		<p id="k">equipo salió con una pancarta de apoyo.</p>


		<p id="l">_____________________________________________________________________________________</p>

		<img src="imagenes/cali.jpg" id="img-cali">
		<p id="m">Cali es el nuevo líder de el torneo Ricaurte:</p>
		<p id="n">venció 3-0 a Millonarios</p>
		<p id="o">Actualizado hace 4 horas</p>
		<p id="p">Los goles del triunfo del 'glorioso' los anotaron</p>
		<p id="q">Jhon Pajoy, Sambueza y German Mera.</p>


		<img src="imagenes/colombia.jpg" id="img-colombia">
		<p id="r">Portugal le aguó el debut a Colombia</p>
		<p id="s">en el Mundial: empate 1-1</p>
		<p id="t">Actualizado Hace 1 Hora</p>
		<p id="u">A ritmo de salsa y con un empate entre los locales y Portugal,</p>
		<p id="v">inició la Copa Mundo Fifa de Fútsal.</p>

		<p id="w">___________________________________________________________________________________________________________________________________________________________________________________</p>

		<div class="slider">
			<ul>
				<li><img src="imagenes/1.jpg" alt=""></li>
				<li><img src="imagenes/2.jpg" alt=""></li>
				<li><img src="imagenes/3.jpg" alt=""></li>
				<li><img src="imagenes/4.png" alt=""></li>
			</ul>
		</div>

		<div id="div-res">
			<h2 id="res">RESULTADOS</h2>
			<div>
				<table id="tabla-res" border="1px">

					<thead>
						<tr>
							<th><b>EQUIPO</b></th>
							<th><b>EQUIPO</b></th>
							<th><b>RESULTADO</b></th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><b>Cali</b></td>
							<td>Millonarios</td>
							<td><b>3 : 0</b></td>
						</tr>
						<tr>
							<td>Cucuta</td>
							<td><b>Chico</b></td>
							<td><b>1 : 2</b></td>
						</tr>
						<tr>
							<td><b>Nacional</b></td>
							<td>Medellin</td>
							<td><b>1 : 0</b></td>
						</tr>
						<tr>
							<td><b>Patriotas</b></td>
							<td>Junior</td>
							<td><b>3 : 2</b></td>
						</tr>
						<tr>
							<td>Santa Fe</td>
							<td>Tolima</td>
							<td><b>3 : 3</b></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<p id="y">__________________________________________________________</p>

		<div id="div-pro">
			<h2 id="pro">PROXIMOS PARTIDOS</h2>
			<div>
				<table id="tabla-pro" border="1px">

					<thead>
						<tr>
							<th id="th"><b>EQUIPO</b></th>
							<th id="th"><b>CONTRA</b></th>
							<th id="th"><b>EQUIPO</b></th>
							<th id="th"><b>HORA</b></th>
							<th id="th"><b>FECHA</b></th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td>Cali</td>
							<td>VS</td>
							<td>Medellin</td>
							<td>1:00 PM</td>
							<td>03/08/16</td>
						</tr>
						<tr>
							<td>Cucuta</td>
							<td>VS</td>
							<td>Junior</td>
							<td>2:00 PM</td>
							<td>03/08/16</td>
						</tr>
						<tr>
							<td>Millonarios</td>
							<td>VS</td>
							<td>Tolima</td>
							<td>3:00 PM</td>
							<td>03/08/16</td>
						</tr>
						<tr>
							<td>Nacional</td>
							<td>VS</td>
							<td>Chico</td>
							<td>2:00 PM</td>
							<td>04/08/16</td>
						</tr>
						<tr>
							<td>Patriotas</td>
							<td>VS</td>
							<td>Santa Fe</td>
							<td>5:00 PM</td>
							<td>04/08/16</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<p id="z">___________________________________________________________________________________________________________________________________________________________________________________</p>

		<div>
			<h1 id="pu">PUBLICIDAD</h1>
			
			<a href="http://electricidadelectronicaytelecomu.blogspot.com.co/" target="_blank"><img src="imagenes/publicidad.gif" id="img-pu"></a>

			<embed allownetworking="internal" allowscriptaccess="never" height="100" quality="100" src="http://www.creatupropiaweb.com/recursos/relojes/coleccion_relojes-flash/clock_226.swf" type="application/x-shockwave-flash" width="200" wmode="transparent" id="reloj">

			<a href="http://www.sena.edu.co/oportunidades/formacion/Paginas/SENA-Bilingue.aspx" target="_blank"><img src="imagenes/ingles.jpg" id="img-opor"></a>
		</div>
	</body>
</html>