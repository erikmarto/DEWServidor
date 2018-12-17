<?php
require 'init.php';
if(!isset($_POST['ficheros']))
    header('Location:verfotos.php');

//Venimos de confirmar
if(isset($_POST['confirma'])) {
    foreach($_POST['ficheros'] as $imagen){
        if(!unlink($fotos.'/'.$imagen)) 
            echo "Error al borrar ".$imagen;
    }
    header('Location:verfotos.php');
}


require 'header.php';
echo "<hr><form method=post>";
foreach($_POST['ficheros'] as $imagen){
    echo "<div class=foto>
        <a href='$fotos/$imagen'><img src='$fotos/$imagen' ></a>
        <input type=hidden name='ficheros[]' value='$imagen'>
    </div>";
}
?>
<div style='clear:left'>
    <button type=submit name='confirma'><i class='fa fa-trash'> Confirmar borrado</i></button>
</form>
<?php
require 'footer.php';
?>
