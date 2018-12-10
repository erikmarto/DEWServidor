<?php


function hoy($formato='d/m/Y',$echo=false) {
    if(!$echo){
        return date($formato);
    }else {
        echo date($formato);
    }  
}


/* Para utilizar algunas librerias nos tenemos que ir a config de XAMPP(apache) y en php.ini
quitar el ; de la libreria aparte de reiniciar apache */
if(function_exists('ldap_connect')){
    ldap_connect('localhost');
}else{
    die("No está cargada en el módulo");
}


echo hoy('asdsdas');
echo '<p>';
hoy('d/m/Y',true);
echo '<p>';
echo hoy('Y-m-d');

?>