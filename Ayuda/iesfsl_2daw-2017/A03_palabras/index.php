<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>Contador de palabras</h2>
        <?php
        /** Contador de palabras mediante 3 métodos
         */
        echo "Bytes a procesar: ";
        foreach (array(1000, 10000, 50000, 150000, 50000000) as $m)
            echo "<a href=?m=$m>$m</a> ";

        if (!isset($_GET['m']))
            die;

        $maxlon = $_GET['m'];
        echo "<h3>Procesando $maxlon caracteres como máximo</h3>";

        /** Cuenta palabras de un texto
         * 
         * @param string $pals   Texto 
         * @return int Array de frecuencias: palabra=>apariciones
         */
        function contar($pals) {
            $ret = array();
            foreach ($pals as $p)
                if (!isset($ret[$p]))
                    $ret[$p] = 1;
                else
                    $ret[$p] ++;
            return $ret;
        }

        /** Utilizando un array de la forma pals[i]=array(palabra,veces). Muy poco óptimo
         * 
         * @param type $pals
         * @return int
         */
        function contarmal($pals) {
            $ret = array();
            foreach ($pals as $p) {
                $encontrado = false;
                foreach ($ret as $i => $r)
                    if ($ret[$i][0] == $p) {
                        $ret[$i][1] ++;
                        $encontrado = true;
                        break;
                    }
                if (!$encontrado)
                    $ret[] = array($p, 1);
            }
            return $ret;
        }

        $texto = strtolower(file_get_contents('./LosPilares.txt', false, null, 0, $maxlon)); //Lee como máximo maxlon caracteres
        $texto = str_replace("-\n", "", $texto); //Junta palabras divididas con guión y salto de linea
        
        //Trocea en palabras. 
        $pals = preg_split("/[\s,.;:¿?¡!-]+/", strtolower($texto), -1, PREG_SPLIT_NO_EMPTY); 
        unset($texto);
        
        //----------------  Con función de usuario
        $start = microtime(true);
        $x1 = contar($pals);
        echo "<li>Con función de usuario: " . (microtime(true) - $start);

        //----------------  Con array_count_values
        $start = microtime(true);
        $x2 = array_count_values($pals);
        echo "<li>Con array_count_values: " . (microtime(true) - $start);

        //---------------- Con función de usuario incorrecta
        if ($maxlon < 200000) { //Si es más grande le cuesta demasiado tiempo
            $start = microtime(true);
            $x3 = contarmal($pals);
            echo "<li>Con función secuencial " . (microtime(true) - $start);
        } else
            echo "<li>Con función secuencial: no calculado";
        ?>


        <h3>Frecuencias</h3>
        <table border="1"><tr><th>Palabra<th>Frecuencia</th></tr>
            <?php
            arsort($x2);
            $p = 0;
            foreach ($x2 as $pal => $veces) {
                $p++;
                echo '<tr><td>' . utf8_encode($pal) . '<td>' . $veces;
                if ($p > 100)
                    break;
            }
            ?>
        </table>
    </body>
</html>

