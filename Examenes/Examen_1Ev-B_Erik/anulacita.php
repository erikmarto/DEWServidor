<?php
require 'init.php';

if (!isset($_GET['dia']) || !isset($_GET['mes']) || !isset($_GET['hora'])) {
    header("Location: citasdia.php?dia=$_GET[dia]&mes=$_GET[mes]");
} 

$calendario->anularcita($_GET['mes'],$_GET['dia'], $_GET['hora']);
header("Location: citasdia.php?dia=$_GET[dia]&mes=$_GET[mes]");
?>