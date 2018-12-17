<?php
require 'init.php';

require 'header.php';
?>

<a href=upload.php class='btn btn-primary' ><i class='fa fa-upload'></i> Subir Fotos</a>
<hr>
<form method=post action=borrar.php>

    <?php
    chdir($fotos); //Nos cambiamos al directorio de imagenes y así evitamos que los nombres de fichero contengan rutas
    foreach (glob('*.*') as $imagen) {
        echo "<div class=foto>
            <a href='$fotos/$imagen'><img src='$fotos/$imagen' ></a><br>
            <input type=checkbox name='ficheros[]' value='$imagen'>
            <a href='editar.php?fichero=$imagen'><i class='fa fa-pencil'></i></a>    
            </div>";
    }
    chdir('..');
    ?>
    <div style='clear:left'>    </div>
    <button type=submit class='btn btn-success' ><i class='fa fa-trash'> Borrar seleccionadas</i></button>
</form>

<?php
require 'footer.php';
?>