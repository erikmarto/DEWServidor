
<!--Tenemos un fichero llamado boletos.txt con los boletos de la primitiva de una jornada. 
Cada boleto tiene un número de serie y los números que se han jugado, con el formato:

numeroserie=Numeros separados por comas

890=2,4,5,23,32,12
892=3,8,15,33,42,52

Desarrolla un script php que solicite la combinación ganadora (6 números del 1 al 49), 
y procese el fichero boletos.txt, mostrando un listado de los que obtengan 5 o 6 aciertos, de la forma:

numeroserie, aciertos
numeroserie,aciertos
Al final del listado debe mostrar el total de boletos con 5 y con 6 aciertos.-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>EJ 01</title>
    <h3> Comprobar Ganadora </h3>
</head>
<body>
<form method="post" action="primitiva.php">
    <label>Comprobación ganadora:</label>
<?php

for ($i = 1; $i <= 6; $i++) {
    echo "<input name='ganadora$i' placeholder='Número $i' size='2'>";
}
echo '<input type="submit" value="Comprobar"></form><pre>';

$ganador = [];
for($i = 1;$i<=6;$i++) {
    if(empty($_POST["ganadora$i"]) || ($_POST["ganadora$i"] < 0 || $_POST["ganadora$i"] > 49)) die;
    $ganador[] = $_POST["ganadora$i"];
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

echo "Hay " . $aciertos[5] . " con 5 aciertos <br>";
echo "Hay " . $aciertos[6] . " con 6 aciertos <br>";
?>
</form>
</body>
</html>