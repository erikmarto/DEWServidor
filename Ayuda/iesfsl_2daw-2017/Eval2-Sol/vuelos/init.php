<?php
$db=new pdo('mysql:host=reminet.iesfsl.org;dbname=test_vuelos','2daw','iesfsl') or die("Error al conectar a la BD");

function desplegable($name,$lista){
  echo "<select name='$name'> <option>Selecciona...</option>";
  foreach ($lista as $value=>$label) {
    echo "<option value=$value>$label</option>";
  }
  echo "</select>";

}

function getaeropuertos(){
  global $db;
  $aeropuertos=[];
  foreach($db->query('select id,ciudad from aeropuertos order by ciudad')->fetchAll() as $r)
    $aeropuertos[$r['id']]=$r['ciudad'];
  return $aeropuertos;
}

?>
