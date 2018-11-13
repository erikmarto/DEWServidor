<?php
require 'init.php';


$aeropuertos=[];
foreach($db->query('select id,ciudad from aeropuertos order by ciudad')->fetchAll() as $r)
  $aeropuertos[$r['id']]=$r['ciudad'];


if(isset($_GET['buscar'])){
  $origen=$_GET['origen'];
  $destino=$_GET['destino'];
  $fecha=$_GET['fecha'];

  if(!$fecha ||  !$origen || !$destino){
    $error='Los 3 datos son obligatorios';
  } else {
    $sql='select v.*,a.modelo from vuelos v,aviones a where a.id=v.aviones_id 
    and fecha=:fecha and aeropue1_id=:origen and aeropue2_id=:destino';
    $query=$db->prepare($sql);
    $query->execute([':fecha'=>$fecha,':origen'=>$origen,':destino'=>$destino]);
    $vuelos=$query->fetchAll();
    require 'views/lista.php';
    die();
  }
}

require 'views/buscar.php';

 ?>
