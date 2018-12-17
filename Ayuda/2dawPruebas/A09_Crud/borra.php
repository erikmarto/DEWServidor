<?php
// Borra un usuario
// Recibe la id por POST
require 'init.php';

if(!isset($_POST['id'])) die("Error de ejecución");

$id=$_POST['id'];

$query=mysqli_query($db,'delete from usuarios where id='.$id);

if(!$query) 
    die("Error al borrar ".mysqli_error($db));
else
        header('Location:index.php');
?>
