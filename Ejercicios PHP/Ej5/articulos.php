<?php
//Articulos añadidos
$categorias=[
    "TV"=>["nombre"=>"Televisores", "portada"=>"Si"],
    "TE"=>["nombre"=>"Telefonia", "portada"=>"Si"],
    "LB"=>["nombre"=>"Linea blanca", "portada"=>"No"]
];

$articulos=[
    "tv0"=>["nombre"=>"Lg90", "precio"=>640, "categoria"=>"TV"],
    "tv1"=>["nombre"=>"Noc70", "precio"=>320, "categoria"=>"TV"],
    "tv2"=>["nombre"=>"Acer54", "precio"=>200, "categoria"=>"TV"],
    "te0"=>["nombre"=>"A1", "precio"=>270, "categoria"=>"TE"],
    "te1"=>["nombre"=>"A2", "precio"=>320, "categoria"=>"TE"],
    "te2"=>["nombre"=>"A6", "precio"=>800, "categoria"=>"TE"]
];

echo $articulos ["tv0"]["precio"]; //Televisores
echo $articulos ["te0"]["nombre"]; //Telefonia


var_dump($articulos);

?>