<!--Se encarga de subir imágenes a la carpeta.
Muestra 5 campos tipo file para subir hasta 5 ficheros y un botón de "Enviar"
Cuando se reciben los ficheros, se colocan en la carpeta con el nombre original que tenían en el cliente, y se enlaza con index.php-->
<html>
<head>
    <title>Subir Imagenes</title>
</head>

<?php
define('MAX_FILES', 5);
$name = [];
$tmp_names = [];
$errores = [];

if (isset($_FILES['img'])) {
    var_dump($_FILES['img']);
    for ($i = 0; $i<MAX_FILES;$i++) {
        if ($_FILES['img']['error'][$i] == 0) {
            $name[$i] = $_FILES['img']['name'][$i];
            $tmp_names[$i] = $_FILES['img']['tmp_name'][$i];
            move_uploaded_file($tmp_names[$i], 'img/'.$name[$i]);
        }
    }
    header('Location: '.'index.php');
    die;
}
include "main.html";
?>

<body>
<div>
    <div class="row justify-content-center">
        <form method="POST" class="upload-form " enctype="multipart/form-data">
            <?php
                for($i = 0;$i<MAX_FILES;$i++) {
                    echo "<div><input type='file' name='img[]'></div>";
                }
            ?>
            <input type="submit" class="btn" name="enviar" value="Enviar">
        </form>
    </div>
</div>
    
</body>
</html>