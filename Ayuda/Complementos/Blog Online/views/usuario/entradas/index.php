<div id="entradas-wrapper">
    <?php
    foreach($entradas as $ent){
        echo "<div class='entrada-num'>";
        echo "<div class='titulo-entrada'><a href=?r=entrada/view&id={$ent->id}>{$ent->titulo}</a></div>";
        //echo "<div class='comentario-entrada'>{$ent->texto}</div></div>";
    }
    ?>
</div>
