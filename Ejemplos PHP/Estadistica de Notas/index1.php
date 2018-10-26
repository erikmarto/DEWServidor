<!DOCTYPE html>
<html>
<head>
    <title>NOTAS</title>
</head>
<body>
<h1>NOTAS DEL CURSO</h1>
<?php

$f=fopen("notasalumnos.csv","r");


$aprobados = 0;
$suspensos = 0;
$asigbuscada = 'VL2';

while($linea=fgets($f)){
    list($alumno,$asig,$nota)=explode(",",trim($linea));
    if($asig==$asigbuscada){
        if($nota>=5){
            $aprobados++;
        } else {
            $suspensos++;
        }
    }
}

$total = $aprobados + $suspensos;

echo "<h3> Asignatura: ".$asigbuscada.'</h3>';
//echo "<li> asignatura = ".$asig.", nota = ".$nota;
echo "<li>Total aprobados ".$aprobados." ".round($aprobados/$total*100).' %';

echo "<li>Total suspensos ".$suspensos." ".round($suspensos/$total*100).' %';

//printf("<li>Total suspensos %d %d %% ".$suspensos.round($suspensos/$total*100)) ;


/*while(!feof($f)){
    $linea=fgets($f);
    echo "<li>".$linea;
}*/
?>
</body>
</html>