<?php
require 'init.php';
$id=$_GET['id'];

$aeropuertos=getaeropuertos();
$vuelo=$db->query('select *  from vuelos where  id='.$id)->fetch();
if(!$vuelo) die("Vuelo inexistente");

if(isset($_POST['reservar'])){
  $plazas=$_POST['plazas'];
  $nombre=$_POST['nombre'];
  $libres=$db->query('select * from asientos where vuelos_id='.$id.' and pasajero is null')->fetchAll();
  echo "<h2>Reservando plazas....</h2>";
  
  if(count($libres)<$plazas)
    die( "No hay suficientes plazas libres");
  else {
    $update=$db->prepare("update asientos set pasajero=:pasajero,precio=:precio where id=:id");
    $n=0;
    foreach($libres as $asiento){
      $update->execute([':id'=>$asiento['id'],'pasajero'=>$nombre,':precio'=>$vuelo['precio']]);
      echo "<li>Reservado el asiento ".$asiento['asiento'];
      $n++;
      if($n==$plazas) break;
    }
    die();
  }
}

$origen=$aeropuertos[$vuelo['aeropue1_id']]; //También se puede hacer directamente en la sql con join a aeropuetos
$destino=$aeropuertos[$vuelo['aeropue2_id']];

require('views/reserva.php');


 ?>
