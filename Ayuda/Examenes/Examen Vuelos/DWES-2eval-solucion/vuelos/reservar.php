<?php

// Reserva una plaza en un vuelo.
require "init.php";
require 'clases/utilvuelos.php';

if(!isset($_GET['id']))die ('Error, ejecución incorrecta');
$id=$_GET['id'];

$v=new utilvuelos;
$v->load($id);

if(isset($_POST['pasajero'])){
	$v->reservaasiento($_POST['asientos_id'],$_POST['pasajero']);
	require 'views/cabecera.php';
	echo "<h3>Reserva realizada<h3>";
} else
	require "views/reservar.php";