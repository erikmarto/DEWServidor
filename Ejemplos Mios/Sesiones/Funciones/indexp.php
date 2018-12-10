<?php

function mayus($nom){
    if(is_string($nom)){
        return strtoupper($nom);
    }elseif(is_array($nom)){
        foreach($nom as $i=>$n){
            $nom[$i]=strtoupper($n);
        }
        return $nom;
    }
}

// Por referencia
function mayusref(&$nom){
    if(is_string($nom)){
        $nom= strtoupper($nom);
    }elseif(is_array($nom)){
        foreach($nom as $i=>$n){
            $nom[$i]=strtoupper($n);
        }
    }
}


$nombre='manolo';
$nombre = mayus($nombre);

echo $nombre;

$nombres = ['pepe','andrea'];
$nombres = mayus($nombres);
echo '<p>';
echo $nombres[0];


echo '<p>Por referencia';
$nombres=['pepe','andrea'];
mayusref($nombres);
var_dump($nombres);

//ERRROR mayusref('iiii);
echo mayus('assdasd');

?>