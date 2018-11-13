<?php
//Control de entrada de prendas en probadores
session_start();

if (!isset($_SESSION['numprobadores'])) {
    header('Location:index.php');
}

$numprobadores=$_SESSION['numprobadores'];

if (isset($_POST['art'])) { 
    $art=$_POST['art'];
} else {
    $art='';
}

if (isset($_POST['pren'])) { 
    $pren=$_POST['pren'];
    if($pren<=0 || $pren>$numprobadores) {
        $error="Incorrecto";
    }
    //Hora
	$_SESSION['hora'][$pren] = date('H:i');	
} elseif ($art!='v' && $art!='') {
        $error="No puso probador";
}

switch ($art) {
    case '+'://Añade una prenda al probador N
        $_SESSION['probador'][$pren]++;
        break;
    case '-'://Disminuye una prenda en el probador N
        if ($_SESSION['probador'][$pren]>0) {
            $_SESSION['probador'][$pren]--;
        }
        break;
    case 'x'://Vacía el probador N
        $_SESSION['probador'][$pren]=0;
        break;
    case 'v'://Vacia todos los probadores
		for ($j=1;$j<=$numprobadores;$j++){
            $_SESSION['probador'][$j]=0;
        }
}

require 'vista.php';
?>
