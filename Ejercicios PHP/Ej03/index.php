<!--Muestra las imágenes del directorio en forma de Iconos, con una anchura fija de 200 px (utiliza divs flotantes)
Cada imagen mostrada es un enlace a ella misma, para poder visualizarla en el tamaño original
En cada imagen incluiremos un checbox que me permitirá seleccionarla
Incluiremos un botón de "Borrar imagenes" que enviará el formulario al script delete.php para borrar las imagenes seleccionadas con el checkbox
Incluiremos un botón de "Subir imágenes" que enlazará con el script "upload.php"-->
<html>

<?php
$img_dic = "img";
$img;

require_once "ficheros.php";

if (scandir($img_dic)) {
    $img = array_diff(scandir($img_dic), array('..', '.'));
    sort($img);
}

include "main.html";
?>

<body>
    
<div>
    <form method="post" action="delete.php">
        <?php
            mostrar($img);
        ?>
        <div class="row justify-content-center">
            <?php
                if (count($img)>0) {
                    echo '<input type="submit" class="btn" value="Borrar" name="enviar">';
                } else {
                    echo '<button class="btn"><a href="upload.php">Enviar a la nube</a></button>';
                }
            ?> 
        </div>
    </form>
</div>

</body>
</html>
