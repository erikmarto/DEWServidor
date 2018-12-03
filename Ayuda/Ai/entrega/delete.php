<?php

$imagesToDelete;

include "html/header.html";
require_once "func.php";

if (isset($_POST['encodedImgPaths'])) {
    $imagesToDelete = explode(',,', $_POST['encodedImgPaths']);
    foreach($imagesToDelete as $imageToDelete) {
        $realPath = realpath("images/$imageToDelete");
        if (is_writable($realPath)) {
            unlink($realPath);
        }
    }
}

if (!isset($_POST['deleteImg']) || isset($_POST['encodedImgPaths'])) {
    header('Location: '.'index.php');
    die;
}

if (isset($_POST['encodedImgPaths'])) {
    $imagesToDelete = unserialize($_POST['encodedImgPaths']);
    foreach($imagesToDelete as $imageToDelete) {
        $realPath = realpath("images/$imageToDelete");
        if (is_writable($realPath)) {
            unlink($realPath);
        }
    }
    header('Location: '.'index.php');
    die;
}
$imagesToDelete = $_POST['deleteImg'];
//var_dump($imagesToDelete);
?>

<div class="container h-75">
    <?php
    mostrarImagenes($imagesToDelete, false);
    
    ?>
    <div class="row justify-content-center">
        <h2>Are you sure you want to delete <?=count($imagesToDelete)>1?"these ".count($imagesToDelete)." images?":"this image?"?></h2>
    </div>
    <div class="row justify-content-center">
        <form method="post">
            <input type="hidden" name="encodedImgPaths" value="<?= implode(',,', $imagesToDelete)?>">
            <div class="btn-group">
                <input type="submit" class="btn btn-pink" value="Delete" name="del">
                <button class="btn btn-pink"><a href="index.php">Volver</a></button>
            </div>
        </form>
    </div>
</div>
<?php
include "html/footer.html";
?>