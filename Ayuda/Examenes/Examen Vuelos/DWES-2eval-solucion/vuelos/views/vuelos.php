<?php
require 'cabecera.php';
?>
<table border="1"><tr><th>Fecha<th>Modelo<th>Origen<th>Destino<th>precio</tr>

<?php
foreach($vuelos as $vuelo){
	printf("<tr><td>%s<td>%s<td>%s<td>%s<td>%s<td> <a href='crearasientos.php?id=%d'>Crear asientos</a></tr>",
		$vuelo['fecha'],$vuelo['modelo'],$vuelo['origen'],$vuelo['destino'],$vuelo['precio'],
			$vuelo['id']);
}
echo "</table>";