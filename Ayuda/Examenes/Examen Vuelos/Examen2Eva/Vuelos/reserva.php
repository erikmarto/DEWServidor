<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "init.php";

if(!isset($_GET['id']))
    die('Error');
$id=$_GET['id'];

$v=new reservaVuelos;
$v=cargarVuelo($id);

if(!isset($_POST['pasajero'])){
    $v->reservaAsiento($_POST['asientos_id'],$_POST['pasajero']);
    echo "<h3>Reserva guardada<h3>";
} else
	require "views/vistaReserva.php";