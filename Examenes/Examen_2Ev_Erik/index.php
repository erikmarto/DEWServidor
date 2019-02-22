<?php
    require "conf_init.php";
    require "funciones.php";
?>
<html> 
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<h2>Autobuses ALSA</h2>
<a class='btn btn-primary' href="alta.php">Alta de viaje</a>

<h3>Viajes Planificados</h3>

<table border=2>
    <tr>
        <th>Destino</th>
        <th>Fecha</th>
        <th>Plazas</th>
        <th>Plazas libres</th>
        <th></th>
    </tr>
    <?php
        $buses = $consulta_PDO->query('SELECT viajes.fecha as fecha, viajes.destino as destino, viajes.plazas as plazas,
        viajes.id as id, SUM(if(asientos.ocupado = 0, 1, 0)) as plazas_libres FROM viajes INNER JOIN asientos ON asientos.viajes_id = viajes.id GROUP BY viajes_id')->fetchAll(PDO::FETCH_OBJ);
        foreach($buses as $bus) {
            echo '<tr>';
            echo '<td>'.$bus->destino.'</td>';
            echo '<td>'.$bus->fecha.'</td>';
            echo '<td>'.$bus->plazas.'</td>';
            echo '<td>'.$bus->plazas_libres.'</td>';
            echo '<td>'.vender_boton($bus->plazas_libres, $bus->id).'</td>';
            echo '</tr>';
        }
    ?>
</table>