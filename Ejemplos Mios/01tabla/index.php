<html>
<title>Tablas de multiplicar</title>

<style>
.numero {
    padding:10px;
    background:green;
    margin:5px;
    }
</style>

<body>
<h1>Tablas de multiplicar</h1>

<?php 
/*
Ejercicio tablas
*/ 

for($i=1 ; $i<10 ; $i++){
    echo "<a href='?tabla=$i'><span class=numero>$i</span></a>";
}

if(isset($_GET['tabla'])) {
    $tabla = $_GET['tabla'];
    ?>

<h3>Tabla del <?= $tabla ?> </h3>

<?php
    for($i=1 ; $i<=10; $i++){
        echo ' <br> '.$tabla.' x '.$i.' = '.$tabla*$i;

    //printf("<br>%d x %d = %d",$tabla,$i,$tabla*$i);
    }
    echo "<a href='practicar.php?tabla=$tabla' class=numero>Practicar</a>";
}
?>
</body>
</html>