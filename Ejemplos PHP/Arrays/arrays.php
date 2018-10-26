<?php

$nombres = ["Ana", "Bernardo", "Carmen"];
//$nombres = array("Ana", "Bernardo", "Carmen"); Sintaxis antigua

$nombres[4] = 'PEPE';
$nombres['34234323'] = 'Felipe';
$nombres[2] = 'Luis';
$nombres[] = 'Daniel'; //Añadir al último índice número +1
 
$nombres[9999999] = 'Andrea';
$nombres[] = 'asdasd';
rsort($nombres);
if(in_array('Carmen',$nombres)) echo "Carmen Existe";
unset($nombres[0]); //Designamos un dato

var_dump($nombres);

$datos = [ "42344357L" => ['nombre' => 'Felipe','apellidos' => 'Garcia'],
        "43215637K" => ['nombre' => 'Carmen','apellidos' => 'Pérez'] ];

echo '<p>';
$keys = array_keys($datos);

for($i=0; $i<count($datos); $i++){
    echo '<li>'.$datos[$keys[$i]]['nombre'];
}

foreach($datos as $dni=>$dato){
    echo '<li>'.$dni.' - '.$dato['nombre'];
}

$dato=reset($datos);
while($dato){
    echo '<li>'.$dato['nombre'];
    $dato=next($datos);
}

?>