<?php

$fichero=[];

if(isset($_FILES) && isset($_FILES['fichero'])){
    $ruta=$_FILES['fichero']['tmp_name']; //ruta temporal donde está el fichero
    //echo file_get_contents($ruta);
    $nombre=$_FILES['fichero']['name'];
    move_uploaded_file($ruta, 'imagenes/'.$nombre);
}



require_once "cabecera.php";

?>

<form  method="post" enctype="multipart/form-data">
    <input type="file" name="fichero">
    <input type="submit" value="Enviar" name="enviar">
</form>