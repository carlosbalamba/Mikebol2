<!--<?php

if (!isset($_SESSION["id_usuario"])) {
	header("Location: index.php");
}
?>-->

<!DOCTYPE html>
<html>
<head><link href="imagenes/mi.png" rel="shortcut icon" type="image/x-icon">
	<title>Tabla de posiciones</title>
	<link href="Estilos/estilos/tablaposiciones.css" rel="stylesheet">
</head>
<body>
	<p id="tp">___________________________________________________________________________________________________________________________________________________________________________________</p>

	<div>
		<h2 id="th2">Tabla de posiciones</h2>
		<div id="tablaPos" class="table-responsive">
			<table id="tt" border="1px" class="table">
				<tbody>
				<tr>
						<th><b>POS</b></th>
						<th id="especial"><b>Equipo</b></th>
						<th id="esp2"><b>PTS</b></th>
						<th id="esp3"><b>PJ</b></th>
						<th id="esp4"><b>PG</b></th>
						<th id="esp5"><b>PE</b></th>
						<th id="esp6"><b>PP</b></th>
						<th id="esp7"><b>GF</b></th>
						<th id="esp8"><b>GC</b></th>
						<th id="esp9"><b>DG</b></th>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>1</td>
						<td>Cali</td>
						<td><b>6</b></td>
						<td>3</td>
						<td>2</td>
						<td>0</td>
						<td>1</td>
						<td>8</td>
						<td>4</td>
						<td>4</td>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Cucuta</td>
						<td><b>4</b></td>
						<td>3</td>
						<td>1</td>
						<td>2</td>
						<td>0</td>
						<td>5</td>
						<td>5</td>
						<td>0</td>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Millonarios</td>
						<td><b>4</b></td>
						<td>3</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>5</td>
						<td>5</td>
						<td>0</td>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Nacional</td>
						<td><b>4</b></td>
						<td>3</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>6</td>
						<td>4</td>
						<td>2</td>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Patriotas</td>
						<td><b>4</b></td>
						<td>3</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>3</td>
						<td>4</td>
						<td>-1</td>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>6</td>
						<td>Medellin</td>
						<td><b>4</b></td>
						<td>3</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>6</td>
						<td>8</td>
						<td>-2</td>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>7</td>
						<td>Junior</td>
						<td><b>3</b></td>
						<td>3</td>
						<td>1</td>
						<td>0</td>
						<td>2</td>
						<td>7</td>
						<td>7</td>
						<td>0</td>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>8</td>
						<td>Chico</td>
						<td><b>3</b></td>
						<td>3</td>
						<td>1</td>
						<td>0</td>
						<td>2</td>
						<td>4</td>
						<td>6</td>
						<td>-2</td>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>9</td>
						<td>Tolima</td>
						<td><b>2</b></td>
						<td>3</td>
						<td>0</td>
						<td>2</td>
						<td>0</td>
						<td>5</td>
						<td>6</td>
						<td>-1</td>
					</tr>
					<tr>
						<td id="null"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>10</td>
						<td>Santa Fe</td>
						<td><b>1</b></td>
						<td>3</td>
						<td>0</td>
						<td>1</td>
						<td>2</td>
						<td>6</td>
						<td>9</td>
						<td>-3</td>
					</tr>
				</tbody>
			</table>
			<p><b id="pb">Convenciones:</b> <b>POS:</b> Posición, <b>PTS:</b> Puntos, <b>PJ:</b> Partidos jugados, <b>PG:</b> Partidos ganados, <b>PE:</b> Partidos empatados, <b>PP:</b> Partidos perdidos, <b>GF:</b> Goles a favor, <b>GC:</b> Goles en contra, <b>DG:</b> Diferencia de gol</p>
		</div>
	</div>
</body>
</html>