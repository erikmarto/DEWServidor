<?php

require_once 'init.php';

if(isset($_GET['page']))
    $page=$_GET['page'];
else
    $page=1;
$tampage=10;
$start=($page-1)*$tampage+1;

$query=mysqli_query($db,"select * from usuarios order by nombre LIMIT $start,$tampage ");
if(!$query) die('Error en consulta: '.mysqli_error($db));

$vista='index.php';
require 'vistas/layout.php';
?>



