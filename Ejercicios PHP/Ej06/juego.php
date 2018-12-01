<?php
require 'mastermind.class.php';
session_start();

$masterM = $_SESSION['MasterMind'];

$codigo = isset($_POST['input'])?$masterM->validar($_POST['input']):0;

$numGanador = $masterM->getnumGanador();
$longNum = MasterMind::Nivel[$masterM->getNivel()]['longitud'];
$maxValor = MasterMind::Nivel[$masterM->getNivel()]['max'];
$rondas = $masterM->getRondas();
$intentos = $masterM->getIntentos();
$veces = count($rondas) ?? 0;

$errores = [
    0 => '', 
    3 => "Debe contener $longNum cifras", 
    4 => 'No se pueden repetir los números',
    5 => "Deben de tener valor entre 1 y $maxValor",
    6 => 'No puedes repetir jugada'
];

switch ($codigo) {
    case 0:
    case 3:
    case 4:
    case 5:
    case 6:
        $erroresMsg = $errores[$codigo];
        include 'vistas/jugadas.php';
    break;
    case 1:
        include 'vistas/ganar.php';
    break;
    case 2:
        include 'vistas/perder.php';
    break;
}
?>