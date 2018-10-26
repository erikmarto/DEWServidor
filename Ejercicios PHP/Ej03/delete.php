<!--Recibe como parámetros la lista de ficheros a borrar, los muestra para pedir confirmación, y si el usuario confirma, se borran.
Se debe utilizar una cabecera con el texto "Gestión de Imágenes de la tienda" y un botón "Volver" que enlaza con la gestión de la tienda que hicimos en el otro ejercicio. (Utilizar un 'include')-->
<?php

$imgDelete;

include "main.html";
require_once "ficheros.php";

if (isset($_POST['cogerImg'])) {
    $imgDelete = explode(',,', $_POST['cogerImg']);
    foreach($imgDelete as $imgDelete) {
        $realPath = realpath("img/$imgDelete");
        if (is_writable($realPath)) {
            unlink($realPath);
        }
    }
}

if (!isset($_POST['borrarImg']) || isset($_POST['cogerImg'])) {
    header('Location: '.'index.php');
    die;
}

if (isset($_POST['cogerImg'])) {
    $imgDelete = unserialize($_POST['cogerImg']);
    foreach($imgDelete as $imgDelete) {
        $realPath = realpath("img/$imgDelete");
        if (is_writable($realPath)) {
            unlink($realPath);
        }
    }
    header('Location: '.'index.php');
    die;
}
$imgDelete = $_POST['borrarImg'];
?>

<div>
    <?php
    mostrar($imgDelete, false);
    
    ?>
    <div class="row justify-content-center">
        <h2>Quieres borrar <?=count($imgDelete)?> imagen/es?</h2>
    </div>
    <div class="row justify-content-center">
        <form method="post">
            <input type="hidden" name="cogerImg" value="<?= implode(',,', $imgDelete)?>">
            <div>
                <input type="submit" class="btn" value="Borrar" name="del">
                <button class="btn"><a href="index.php">Volver</a></button>
            </div>
        </form>
    </div>
</div>