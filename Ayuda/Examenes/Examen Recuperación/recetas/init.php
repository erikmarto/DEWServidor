<?php
require 'funciones.inc.php';

$db=new PDO('mysql:dbname=test_vuelos','test','test');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);