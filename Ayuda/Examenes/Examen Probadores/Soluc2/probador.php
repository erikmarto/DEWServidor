<?php

/**
 * Control de entrada de prendas en probadores
 *
 * Acciones (por POST):
 * p: número de probador
 * ac: Acción:
 *   a   Añade una prenda al probador p
 *   b    Disminuye una prenda en el probador p
 *   x    Vacia el probador p
 *   t    Vacia todos los probadores
 *
 */
session_start();
if(!isset($_SESSION['numprobadores']))
	header('Location:index.php');
$numprobadores=$_SESSION['numprobadores'];

if(isset($_POST['ac']))  //Accion a ejecutar
    $ac=$_POST['ac'];
else
    $ac='';

if(isset($_POST['p'])) {  // Numero de probador
    $p=$_POST['p'];
    if($p<=0 || $p>$numprobadores)
        $error='Probador incorrecto';
	$_SESSION['hora'][$p]=date('H:i');	
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
