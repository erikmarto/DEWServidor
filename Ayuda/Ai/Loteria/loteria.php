<html><body>
<h2>Comprobacion de Loteria primitiva</h2>
<form method="post" action="loteria.php">
    <label>Comprobación ganadora:</label>

<?php

for ($i = 1; $i <= 6; $i++) {
    echo "<input name='bol$i' placeholder='Número $i' size='2'>";
}
echo '<input type="submit" value="Comprobar"></form><pre>';

$ganador = [];
for($i = 1;$i<=6;$i++) {
    if(empty($_POST["bol$i"]) || ($_POST["bol$i"] < 0 || $_POST["bol$i"] > 100)) die;
    $ganador[] = $_POST["bol$i"];
}

$boletos = file('boletos.txt');


echo $boletos[0];
$contador = 0;
$aciertos = [5 => 0, 6 => 0];
$boletosep = [];
$numerosep = [];

foreach ($boletos as $boleto) {

    $boletosep[] = explode('=', $boleto);
}

foreach ($boletosep as $numero) {
    $numerosep[$numero[0]] = explode(',', trim($numero[1]));

}

    if (isset($ganador)) {
        foreach ($numerosep as $numero => $numeritos) {
            $cont = 0;
            //$numeritos = $numerosep[$numero];
            foreach ($ganador as $numlot) {
                if (in_array($numlot, $numeritos)) {
                    $cont++;
                }
            }
            if ($cont == 5) {
                $aciertos[5]++;
            }
            else if ($cont == 6) {
                $aciertos[6]++;
            }
        }

    }

    //Separar el string en codigo, numeros. HECHO
    //Separar los numeros a un array HECHO
    //$numeros= //['2','4','6','23','40','32']
    //comparamos $numeros con ganadora y calculamos aciertos.
    //si acertados >= 5 incrementamos aciertos[acertados] y las mostramos

echo "Hay " . $aciertos[5] . " con 5 aciertos <br>";
echo "Hay " . $aciertos[6] . " con 6 aciertos <br>";
//mostramos totales de 5 y 6 aciertos

?>

</body></html>