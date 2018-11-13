<html>
<body>
  <h3>Buscador de vuelos</h3>
  <form>
  Origen <?= desplegable('origen',$aeropuertos) ?>
  Destino <?= desplegable('destino',$aeropuertos) ?>
  Fecha <input name=fecha>
  <input type="submit" name="buscar" value="Buscar">
</form>
</body>
</html>
