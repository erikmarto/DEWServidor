<?php
$banners=[];

function cargabanners(){
    global $banners;
    foreach(file('banners.txt') as $pos=>$linea){
        $banners[$pos]=explode(',',$linea);
    }
}

// Ejercicio 1. Sin control de clic
function getbanner1(){
    global $banners;
    if(!$banners) cargabanners();
    $n=rand(0,count($banners)-1);
    return sprintf("<div class=banner>"
            . "<a href='%s'>%s</a></div>",$banners[$n][0],$banners[$n][1]);

}

// Ejercicio 2: con enlace a clic.php para registrar log
// Se ha añadido que no repita banner (no se pedía en el examen)
function getbanner(){
    global $banners;
    static $quedan; //Lista de números de banners, para ir cogiendo sin repetir
    if(!$banners) {
        cargabanners();
        $quedan=array_keys($banners);
        shuffle($quedan);
    }
    $n=array_pop($quedan);
    
    return sprintf("<div class=banner>"
            . "<a href='clic.php?b=%s'>%s</a></div>",$n,$banners[$n][1]);

}
