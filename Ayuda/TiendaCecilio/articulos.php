<?php
// Categorías y artículos

$categorias=["M"=>"Música","P"=>"Películas","J"=>"Juegos"];

// Aunque el dato id es redundate, se deja asi porque cuando se manejen bases de datos, la informacion del articulo se recupera asi de la base da datos
// Se pone el codigo como clave para poder acceder rapidamente a un articulo

$articulos=[
    'M01'=>['id'=>'M01','titulo'=>'Éxitos de U2','precio'=>20,'cat'=>'M'],
    'M02'=>['id'=>'M02','titulo'=>'Coldplay in China','precio'=>22,'cat'=>'M'],
    'M03'=>['id'=>'M03','titulo'=>'La copla','precio'=>10,'cat'=>'M'],
    'P01'=>['id'=>'P01','titulo'=>'Harry potter 1','precio'=>20,'cat'=>'P'],
    'P02'=>['id'=>'P02','titulo'=>'Casablanca','precio'=>12,'cat'=>'P'],
    'J01'=>['id'=>'J01','titulo'=>'Sims','precio'=>20,'cat'=>'J'],
    'J02'=>['id'=>'J02','titulo'=>'Angry birds','precio'=>22,'cat'=>'J'],
    'J03'=>['id'=>'J03','titulo'=>'Assassins Creed','precio'=>21,'cat'=>'J']
    ];


?>
