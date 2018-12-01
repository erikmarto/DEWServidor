<?php
if ($veces > 0) {
    echo '<div class="rondas"><p class="cabecera">Turno</p><p class="cabecera">Número</p><p class="cabecera">Pista</p>';
    foreach($rondas as $numRondas => $ronda) {
?>
    <div><?=$numRondas + 1?></div>
    <div><?=$ronda['numUsuario']?></div>
    <div>
        <?php
        for ($j = 0; $j < $ronda['cubos']['muerto'] ;$j++) {
            echo "<div class='cubo muerto'></div>";
        }
        for ($j = 0; $j < $ronda['cubos']['herido']; $j++) {
            echo "<div class='cubo herido'></div>";
        }
        ?>
    </div>
<?php
    }
    echo '</div>';
}
?>