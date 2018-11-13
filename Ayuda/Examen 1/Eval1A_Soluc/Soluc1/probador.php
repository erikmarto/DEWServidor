<?php

/**
 * Control de entrada de prendas en probadores
 *
 * Parámetros de ejecución (GET):
 * p=N&ac=a    Añade una prenda al probador N
 * p=N&ac=b    Disminuye una prenda en el probador N
 * p=N&ac=x    Vacía el probador N
 * ac=t        Vacía todos los probadores
 *
 */
session_start();
if(!isset($_SESSION['numprobadores']))
	header('Location:index.php');
$numprobadores=$_SESSION['numprobadores'];

if(isset($_GET['ac']))  //Accion a ejecutar
    $ac=$_GET['ac'];
else
    $ac='';

if(isset($_GET['p'])) {  // Numero de probador
    $p=$_GET['p'];
    if($p<=0 || $p>$numprobadores)
        $error='Probador incorrecto';
}elseif($ac!='t' && $ac!='') {
        $error='No ha especificado probador';
}

switch($ac){  //Ejecutamos acción
    case 'a':
        $_SESSION['probador'][$p]++;
        break;
    case 'b':
        if($_SESSION['probador'][$p]>0)
            $_SESSION['probador'][$p]--;
        break;
    case 'x':
        $_SESSION['probador'][$p]=0;
        break;
    case 't':
		for($i=1;$i<=$numprobadores;$i++)
			$_SESSION['probador'][$i]=0;
        
}


require 'vista.php';
