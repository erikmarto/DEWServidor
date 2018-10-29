<?php

/*
//El indice no es adecuado 
$categorias=[
    ["TV"=>"Televisores"],
    ["TE"=>"Telefonia"],
    ["LB"=>"Linea blanca"]
];

echo $categorias[0]["TV"]; //Televisores

//El contenido solo admite un valor
$categorias=[
    "TV"=>"Televisores",
    "TE"=>"Telefonia",
    "LB"=>"Linea blanca"
];

echo $categorias["TV"]; //Televisores
 */
$categorias=[
    "TV"=>["nombre"=>"Televisores", "portada"=>"Si"],
    "TE"=>["nombre"=>"Telefonia", "portada"=>"Si"],
    "LB"=>["nombre"=>"Linea blanca", "portada"=>"No"]
];

echo $categorias["TV"]["nombre"]; //Televisores
echo $categorias["TV"]["portada"]; //TV en Portada?

$articulos=[
    "tv0"=>["nombre"=>"Lg90", "categoria"=>$categorias["TV"]],
    "te0"=>["nombre"=>"A2", "categoria"=>$categorias["TE"]]
];
?>
