<?php
define('MAX_FILES', 5);
$names = [];
$tmp_names = [];
$errors = [];

if (isset($_FILES['img'])) {
    var_dump($_FILES['img']);
    for ($i = 0; $i<MAX_FILES;$i++) {
        if ($_FILES['img']['error'][$i] == 0) {
            $names[$i] = $_FILES['img']['name'][$i];
            $tmp_names[$i] = $_FILES['img']['tmp_name'][$i];
            while (is_writable('images/'.$names[$i])) {
                $names[$i] = 'copia'+$names[$i];
            }
            move_uploaded_file($tmp_names[$i], 'images/'.$names[$i]);
        }
    }
    header('Location: '.'index.php');
    die;
}


include "html/header.html";
?>


<div class="container d-flex h-75">
    <div class="row flex-grow-1 justify-content-center align-self-center">
        <form method="POST" class="upload-form " enctype="multipart/form-data">
            <?php
                for($i = 0;$i<MAX_FILES;$i++) {
                    echo "<div class='form-row'><div class='col-12 form-group'><input type='file' name='img[]'></div></div>";
                }

            ?>
            <input type="submit" class="btn btn-pink" name="enviar" value="Enviar">
        </form>
    </div>
</div>
<?php
include "html/footer.html";
?>