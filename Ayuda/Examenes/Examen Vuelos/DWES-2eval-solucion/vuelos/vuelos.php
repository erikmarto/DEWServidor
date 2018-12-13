<?php
require 'init.php';

$sql='select v.*,a.modelo,ao.codigo as origen,ad.codigo as destino'
		. ' from vuelos v,aviones a,aeropuertos ao,aeropuertos ad '
		. ' where a.id=aviones_id and ao.id=aeropue1_id and ad.id=aeropue2_id'
		. ' order by modelo';

$vuelos=$db->query($sql)->fetchAll();

require 'views/vuelos.php';

