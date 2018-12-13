<?php

require 'cabecera.php';
?>
<h3>Reservar vuelo de <?=$v->vuelo['origen'] ?> a  <?=$v->vuelo['destino'] ?> el <?=$v->vuelo['fecha'] ?> </h3>

<form method="post">
	Nombre del pasajero: <input name="pasajero"><br>

	Asiento:  <?php
	$asientos=listData($db,'asientos','asiento',"vuelos_id=$id and pasajero is null");
	desplegable('asientos_id',$asientos);
	?>
	<input type="submit" value="Confirmar">
</form>


