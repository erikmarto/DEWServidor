<!DOCTYPE html>
<html>
    <head>
        <title>Contador Palabras</title>
    </head>
    <body>
        <h1>Contador de Palabras:</h1>
        <form method="post" enctype="multipart/form-data" >

        <label>Suba el archivo:</label>
            <input type="file" name="file">
            <input type="submit" value="Enviar" name="enviar">
        <?php
        $file = [];
        if(isset($_FILES) && isset($_FILES['file'])){

            $rutaArchivo = $_FILES['file']['tmp_name'];
            $nombreArchivo = $_FILES['file']['name'];
            move_uploaded_file($rutaArchivo, 'textos/'.$nombreArchivo);

            $textos = file_get_contents('textos/'.$nombreArchivo);

            $valores = preg_split('/[\s, " ", ".", ","]+/',  utf8_encode($textos), -1, PREG_SPLIT_NO_EMPTY);

            $frecuencia = [];
            foreach ($valores  as $palabra) {

                if (isset($frecuencia[$palabra])) {
                    $frecuencia[$palabra]++;
                }else {
                    $frecuencia[$palabra]=1;
                }
            }
            arsort($frecuencia);
            ?>
            <table border='1px'><tr><th>Palabras</th><th>Numº Repetidas</th></tr>
            <?php
            foreach ($frecuencia as $palabra  => $frecuencia) {
                    echo "<tr><td align=center>".$palabra."</td>";
                    echo "<td align=center>".$frecuencia."</td>";
                    echo "</tr>";
            }
        }
        ?>
            </table>
        </form>
    </body>
</html>