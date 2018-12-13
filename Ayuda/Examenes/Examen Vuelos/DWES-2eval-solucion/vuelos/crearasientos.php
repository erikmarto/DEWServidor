<?php
require 'init.php';
require 'clases/utilvuelos.php';


if(!isset($_GET['id']))die ('Error, ejecución incorrecta');
$id=$_GET['id'];

$v=new utilvuelos;
$v->load($id);

$v->crearasientos();

require 'views/cabecera.php';
echo "<h3>Asientos del vuelo creados</h3>";