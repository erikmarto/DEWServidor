<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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