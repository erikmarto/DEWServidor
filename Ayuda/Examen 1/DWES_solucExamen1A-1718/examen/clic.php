<?php
// Gestion el clic en los banners
// Recibe como parámetro b=num de banner
require 'banner.php';
cargabanners();

if(!isset($_GET['b'])) die('Error de ejecución');
$b=$_GET['b'];

//Guardamos el clic
$log=fopen('log.txt','a') or die("Error al hacer log");

fprintf($log,"%s,%s\n",$b,date('d/m/Y H:i:s'));
fclose($log);
//Nos vamos al destino
header('Location:'.$banners[$b][0]);


