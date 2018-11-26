<?php
require_once 'mastermind.php';
session_start();
//session_destroy();
if(!isset($_SESSION['jugador'])){
    $juego = new mastermind();
    $_SESSION['jugador'] = $juego;
}

$jugador=$_SESSION['jugador'];


var_dump($jugador->numeroWinner);

echo "<form method='post'>";
echo "<input type='number' name='codJug'>";
echo "<input type='submit' name='enviar'>";
echo "</form>";
if(isset($_POST['enviar'])){
    var_dump($_POST['codJug']);
    $jugador->comprobarNumero($_POST['codJug']);
    //echo muertos
}



?>