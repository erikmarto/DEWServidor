<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'init.php';
require 'clases/reservaVuelos.php';


if(!isset($_GET['id']))
    die ('Error');
$id=$_GET['id'];

$v=new reservaVuelos;
$v->load($id);

$v->crearAsientos();

require 'views/cabecera.php';
echo "<h3>Asientos del vuelo creados</h3>";