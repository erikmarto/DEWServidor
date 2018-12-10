<!DOCTYPE html>
<html>
<head>
    <title>NOTAS</title>
</head>
<body>
<h1>NOTAS DEL CURSO</h1>
<?php

$f=fopen("notasalumnos.csv","r");

$asigAprobados=[];
$asigSuspendidos=[];

while($linea=fgets($f)){
    list($alumno,$asig,$nota)=explode(",",trim($linea));
    if($nota>=5){
        if(isset($asigAprobados[$asig])){
        $asigAprobados[$asig]++;
        }else{
            $asigAprobados[$asig] = 1;
        }
    }else{
        if(isset($asigSuspendidos[$asig])){
            $asigSuspendidos[$asig]++;
            }else{
                $asigSuspendidos[$asig] = 1;
            }
    }
}
?>

<table border='1'><tr><th>Asignatura</th><th>Aprobados</th><th>Suspendidos</th></tr>
<?php
ksort($asigAprobados);


foreach ($asigAprobados as $asig => $cant) {
    echo "<tr><td>$asig</td><td align=right>$cant</td>";
    if (isset($asigSuspendidos[$asig])) {
        echo "<td>".$asigSuspendidos[$asig]."</td>";
        }else{
            echo "<td>0</td>";
            echo "</tr>";
        }
}


foreach ($asigSuspendidos as $asig => $cant) {
    if (isset($asigAprobados[$asig])) {
        echo "<tr><td>$asig</td><td align=right>$cant</td>";
    }
}
?>
</table>
</body>
</html>