<!DOCTYPE html>
<html>
<head>
    <title>NOTAS</title>
</head>
<body>
<h1>NOTAS DEL CURSO</h1>
<?php

$f=fopen("notasalumnos.csv","r");

$resultados=[];

while($linea=fgets($f)){
    list($alumno,$asig,$nota)=explode(",",trim($linea));

    if(!isset($resultados[$asig])){
        $resultados[$asig]=[0,0];
    }

    if($nota>=5){
        $resultados[$asig][0]++;
    }else{ 
        $resultados[$asig][1]++;
    }
}

//var_dump($resultados[$asig] [0]++);

?>

<table border='1'><tr><th>Asignatura</th><th>Aprobados</th><th>Suspendidos</th></tr>
<?php
ksort($resultados);

foreach ($resultados as $asig => $resultados) {
        echo "<tr><td>".$asig."</td>";
        echo "<td>".$resultados[0]."</td>";
        echo "<td>".$resultados[1]."</td>";
        echo "</tr>";
}
?>
</table>
</body>
</html>