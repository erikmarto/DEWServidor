<?php
// Sube fotos a la carpeta

require 'init.php';
require 'header.php';

$errores=[];
if (isset($_FILES['fichero'])) { //Venimos del POST del formulario
    //var_dump($_POST);
    //var_dump($_FILES);
    foreach ($_FILES['fichero']['name'] as $i => $name) {
        if($name)
            if ($_FILES['fichero']['error'][$i]) // ha habido error al subir
                $errores[]="Error en el fichero " . $name;
            else {
                $ruta = $_FILES['fichero']['tmp_name'][$i];

                if (substr($_FILES['fichero']['type'][$i], 0, 5) != 'image')
                    $errores[]= "ERROR: '$name' no es una imagen";
                elseif (!@move_uploaded_file($ruta, $fotos . '/' . $name)) {
                    $errores[]="Error al mover al fichero " . $name;
                } else {
                    echo "<div class='alert alert-info'>Subida correcta $name. </div>";
                }
            }
    }
}
?>


<form  method="post" enctype="multipart/form-data">
    <?php if($errores) echo '<div class="alert alert-danger">'.implode('<li>',$errores).'</div>'; ?>

    Foto/s :<small>(puedes subir varias a la vez)</small> <input type="file" multiple name="fichero[]" />

    <input type="submit" name="enviar" value="Enviar" />
</form>
<?php
require 'footer.php';
?>
