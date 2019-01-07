<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'funciones.php';
$username='2daw';
$password='';

$db=new PDO('mysql:dbname=test_vuelos',$username,$password);

//$db=new PDO('mysql:host=reminet.iesfsl.org;dbname=test_vuelos',$username,$password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);