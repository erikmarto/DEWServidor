<?php

    function vender_boton($plazas_libres, $buses_id) {
        $boton = "<a href='vendido.php?id=$buses_id'>VENDER</a>";
        return $plazas_libres > 0 ? $boton : "Completo";
    }

    function crearTransp($consulta_PDO, $datos) {
        $transp = $consulta_PDO->prepare("INSERT INTO viajes VALUES (NULL, :fecha, :destino, :plazas)");
            if ($transp->execute($datos)) {
                $mensaje = crearAsient($consulta_PDO, $consulta_PDO->lastInsertId(), $datos['plazas']);
            } else {
                $mensaje = "Error en el viaje";
            }
        return $mensaje;
    }

    function crearAsient($consulta_PDO, $n, $bus_id) {
        $asiento = $consulta_PDO->prepare("INSERT INTO asientos VALUES (NULL, ?, ?, ?, NULL)");
        $mensaje = "Viaje creado";
        for($j = 1; $j <= $n; $j++) {
            if (!$asiento->execute([$bus_id, $j, 0])) {
                return "Fallo al crear el viaje";
            }
        }
        return $mensaje;
    }

    function actualizarAsient($consulta_PDO, $datos){
        $selec_id = $consulta_PDO->prepare("SELECT id, MIN(asiento) FROM asientos WHERE viajes_id = ? AND ocupado = 0");
        $selec_id-> execute([$datos['buses_id']]);
        $id_principal = $selec_id->fetchColum();
        $actualizar = $consulta_PDO->prepare("UPDATE asientos SET ocupado = 1, pasajero = :pasajero WHERE id = :id");
        $actualizar->execute(['pasajero' => $datos['pasajero'], 'id' => $id]);
    }
    
?>