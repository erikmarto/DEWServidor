<?php

$image_dir = "imges";
$images;
$hayImagenes;
require_once "func.php";

if (scandir($image_dir)) {
    $images = array_diff(scandir($image_dir), array('..', '.'));
    sort($images);
}

include "html/header.html";
?>

<div class="container h-75">
    <form method="post" action="delete.php">
        <?php
            mostrarImagenes($images);
        ?>

        <div class="row justify-content-center">
            <?php
                if (count($images)>0) {
                    echo '<input type="submit" class="btn btn-pink" value="Delete" name="enviar">';
                } else {
                    echo '<button class="btn btn-pink"><a href="upload.php">Subir imagen</a></button>';
                }
            ?> 
        </div>
    </form>
</div>
<?php
include "html/footer.html";
?>