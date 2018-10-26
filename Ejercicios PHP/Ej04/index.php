<!DOCTYPE html>
<html>
<head>
    <title>Contador Palabras</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" >
<label>Suba el archivo:</label>
    <input type="file" name="fichero">
    <input type="submit" value="Enviar" name="enviar">

<?php
$file = 'pilares.txt';
$text = file_get_contents($file);
$values = preg_split('/[\s, " ", ".", ","]+/',  utf8_encode($text), -1, PREG_SPLIT_NO_EMPTY);

rsort($values);
$frecuencia = [];


foreach ($values as $palabra) {

    if (isset($frecuencia[$palabra])) {
        $frecuencia[$palabra]++;
    }else {
        $frecuencia[$palabra]=1;
    }
}

//var_dump($frecuencia);

?>
<table border='1'><tr><th>Palabra</th><th>Numº Rep</th></tr>
<?php

foreach ($frecuencia as $values => $frecuencia) {
        echo "<tr><td align=center>".$values."</td>";
        echo "<td align=center>".$frecuencia."</td>";
        echo "</tr>";
}
?>
</table>
</form>
</body>
</html>