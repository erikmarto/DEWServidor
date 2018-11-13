<html>
<body>
  <h2>Reserva</h2>
<table cellspacing=8 border=1><th>Día<th>Hora<th>Desde<th>Hasta<th>Precio</tr>
    <tr><td><?= $vuelo['fecha'] ?></td>
      <td><?= $vuelo['fecha'] ?></td>
      <td><?= $origen ?></td>
      <td><?= $destino ?></td>
      <td><?= $vuelo['precio'] ?></td>
</table>
<p>
<form method=post>
Nombre del que reserva: <input name=nombre><br>
Plazas: <input name=plazas size=2 value=1>
<input type=submit name=reservar value=Reservar>
</form>
</body>
</html>
