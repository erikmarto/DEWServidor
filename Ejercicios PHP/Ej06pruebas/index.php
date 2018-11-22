<?php
require 'vistas/cabecera.php';
require 'mastermind.class.php';

//Inicializamos datos
session_start();
$masterM = new MasterMind;

$numRandom = $masterM->inicio();

var_dump($numRandom);

if(!isset($_SESSION['numRandom'])){
    $numRandom = $_SESSION['numRandom'];
}
var_dump($_SESSION['numRandom']);
$num = $_POST['numero'];

if(isset($num)){
    var_dump($num);
    $masterM->comprobar($num, $_SESSION['numRandom'], 0);
}

require 'vistas/pie.php';
?>

