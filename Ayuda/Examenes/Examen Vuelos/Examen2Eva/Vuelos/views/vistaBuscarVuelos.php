<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require "cabecera.php";
?>
<h3>Buscar vuelos</h3>
<form>
	Origen:
	<?php
	$aeropuertos=listData($db,'aeropuertos','codigo');
	desplegable('aerop1',$aeropuertos,$aerop1);?>

	Destino: 	<?php
	desplegable('aerop2',$aeropuertos,$aerop2);?>

	<input type="submit" value="Buscar">
</form>

<?php
if(isset($vuelos)){
	echo "<h3> Vuelos desde ".$aeropuertos[$aerop1]." hasta ".$aeropuertos[$aerop2]."</h3>";
	?>
	<table border="1"><tr><th>Fecha<th>Modelo Avión<th>Precio</tr>
	<?php

	foreach($vuelos as $vuelo){
		printf("<tr><td>%s<td>%s<td>%s<td> <a href='reservar.php?id=%d'>Reserva</a></tr>",
			$vuelo['fecha'],$vuelo['modelo'],$vuelo['precio'],$vuelo['id']);

	}
	echo "</table>";
}
