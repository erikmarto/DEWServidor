<?php

if(!isset($_GET['tabla'])){
    die("Ejecucion incorrecta. Falta la tabla");
}
//isset($_GET['tabla']) or die("Ejecucion incorrecta. Falta la tabla");

$tabla=$_GET['tabla'];

if(isset($_GET['numero']) && isset($_GET['resultado'])){
    $numero=$_GET['numero'];
    $resultado=$_GET['resultado'];
    if($numero*$tabla==$resultado){
    echo "<h3>MUY BIENN!!!</h3>";
    echo "<a href='?tabla=$tabla'><br>Probar otro numero<br></a>";
    echo "<a href='index.php?tabla=$tabla'>Volver a ver la tabla</a>";
    die;
    } else {
    echo "<h3>Vaya... te has equivocado. Prueba otra vez </h3>";
    }
}
if(!isset($numero)){
    $numero=rand(1,10);
}
?>

<h3>Practicando la tabla del <?=$tabla?></h3>
<form>
    <?=$tabla?> x <?=$numero?> = <input type = number name = resultado>
    <input type = submit value = Comprueba>
    <input type = hidden name = numero value = <?=$numero?>>
    <input type = hidden name = tabla value = <?=$tabla?>>
</form>