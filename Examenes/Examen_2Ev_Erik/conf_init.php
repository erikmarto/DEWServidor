<?php
$ip_host = 'localhost';
$db   = 'test_buses';
$usuario = 'root';
$contraseña = '';

$conexion = "mysql:host=$ip_host;dbname=$db;";

$consulta_PDO = new PDO($conexion, $usuario, $contraseña);
?>