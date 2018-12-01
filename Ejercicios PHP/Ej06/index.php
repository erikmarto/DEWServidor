<?php
require 'mastermind.class.php';

session_start();
if (isset($_GET['volver'])) {
    session_destroy();
    session_start();
}

if (isset($_POST['nivel'])) {
    $masterM = new MasterMind($_POST['nivel']);
    $_SESSION['MasterMind'] = $masterM;
    header("location: juego.php");
}

include 'vistas/elegirNivel.php';
?>