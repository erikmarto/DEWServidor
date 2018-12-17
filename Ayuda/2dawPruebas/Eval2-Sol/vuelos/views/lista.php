<html>
<body>
  <h2>Vuelos seleccionados </h2>
  <h3>Desde <?= $aeropuertos[$origen] ?> a  <?= $aeropuertos[$destino] ?> el día <?= $fecha ?> </h3>
<table cellspacing=8><tr><th>Hora</th><th>Avión</th><th>Precio</th></tr>
<?php
foreach($vuelos as $vuelo){
  printf("<tr><td>%s</td><td>%s</td><td>%s</td><td><a href='reserva.php?id=%d'>Reservar</td></tr>",
    $vuelo['hora'],$vuelo['modelo'],$vuelo['precio'],$vuelo['id']);
}



 ?>
