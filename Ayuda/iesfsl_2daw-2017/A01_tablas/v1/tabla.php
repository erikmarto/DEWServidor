<h3> Tabla de multiplicar</h3>
<style>
    .tabla {width:12%;padding:8px;float:left;margin:8px;background:#dde}  
</style>

<?php
if(isset($_GET['t1']))
    $tabla1 = $_GET['t1'];
else
    $tabla1=1;

if(isset($_GET['t2']))
    $tabla2 = $_GET['t2'];
else
    $tabla2=10;


for ($tabla = $tabla1; $tabla <= $tabla2; $tabla++) {
    echo "<div class=tabla>";
    echo "<h4>Tabla del $tabla</h4>";
    for ($i = 1; $i <= 10; $i++) {
        
        printf("%d x %d = <b>%d</b> ",$tabla,$i,$tabla*$i);
        echo '<br>';
    }
    echo "<a href='practica.php?tabla=$tabla'>PRACTICA!</a>";
    echo "</div>";
}
?>
<div style='clear:left'></div>
<hr>
<a href="index.php">VOLVER AL INICIO</a>

