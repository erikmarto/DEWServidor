<?php
echo 'Boleto ganador: <br/><form action="">';
for ($i = 1;$i<=6;$i++) {
    echo "<input name='bol$i' placeholder='Número $i'>";
}
echo '<input type="submit" value="Comprobar"></form>';

$boletoGanador;


//comprueba que se hayan introducido todos los números y los carga en array $boletoGanador
for($i = 1;$i<=6;$i++) {
    if(empty($_GET["bol$i"]) || ($_GET["bol$i"] < 0 || $_GET["bol$i"] > 100)) die('Debe introducir todos los números, y estos deben ser mayores que 0 y menores que 100.');
    $boletoGanador[] = $_GET["bol$i"];
}

$ganadores5 = [];
$ganadores6 = [];
$perdedores = [0];

echo '<pre>';
$b = file('boletos.txt');

$boletos = [];
//cargar
foreach ($b as $boleto) {
    $bol2 = explode('=', $boleto);
    //si en el archivo txt hay líneas sin datos, dará error
    $boletos[$bol2[0]] = explode(',', trim($bol2[1]));
}

//recorre todos los boletos
foreach ($boletos as $numBol => $nums) {
    $counter = count(array_intersect($boletoGanador, $nums));

    if ($counter == 5) 
        $ganadores5[] = $numBol;  
    elseif ($counter == 6) 
        $ganadores6[] = $numBol;
    /*
    //recorre los numeros del boleto ganador
    foreach ($boletoGanador as $numGanador) {
        //comprueba si el número del boleto ganador está en el boleto
        if (in_array($numGanador, $nums)) {
            $counter++;
        }

    }
    if ($counter === 5) {
        $ganadores5[] = $numBol;
        echo "El boleto $numBol está premiado, concuerdan 5 números.<br>";
    } else if ($counter === 6) {
        $ganadores6[] = $numBol;
        echo "El boleto $numBol está premiado, concuerdan 6 números.<br>";
    } else {
        echo "El boleto $numBol no está premiado, concuerda" . ($counter != 1 ? "n $counter números" : " $counter número") . ".<br>";
    }
    */
}
echo "<br><br>Número de boletos con 6 aciertos: " . count($ganadores6) . "<br>Número de boletos con 5 aciertos: " . count($ganadores5);

if (count($ganadores6) > 0) {
    echo "<br><br>Boletos en los cuales concuerdan 6 números: <br>";
    foreach($ganadores6 as $bolN) 
        echo "Boleto $bolN<br>";
}
if (count($ganadores5) > 0) {
    echo "<br><br>Boletos en los cuales concuerdan 5 números: <br>";
    foreach($ganadores5 as $bolN) 
        echo "Boleto $bolN<br>";
}
?>
