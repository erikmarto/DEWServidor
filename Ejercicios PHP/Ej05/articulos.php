<?php
//Articulos añadidos
$categorias=[
    /* "TV"=>["nombre"=>"Televisores", "portada"=>"Si"],
    "TE"=>["nombre"=>"Telefonia", "portada"=>"Si"],
    "LB"=>["nombre"=>"Linea blanca", "portada"=>"No"] */
    "TV"=>"Televisores",
    "TE"=>"Telefonia",
    "LB"=>"Linea blanca"
];

$articulos=[
    "tv0"=>["id"=>"tv0", "titulo"=>"Lg90", "precio"=>640, "cat"=>"TV"],
    "tv1"=>["id"=>"tv1", "titulo"=>"Noc70", "precio"=>320, "cat"=>"TV"],
    "tv2"=>["id"=>"tv2", "titulo"=>"Acer54", "precio"=>200, "cat"=>"TV"],
    "te0"=>["id"=>"te0", "titulo"=>"A1", "precio"=>270, "cat"=>"TE"],
    "te1"=>["id"=>"te0", "titulo"=>"A2", "precio"=>320, "cat"=>"TE"],
    "te2"=>["id"=>"te0", "titulo"=>"A6", "precio"=>800, "cat"=>"TE"]
];
/* 
echo $articulos ["tv0"]["precio"]; //Televisores
echo $articulos ["te0"]["id"]; //Telefonia
var_dump($articulos);
 */

?>