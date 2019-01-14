<div id="entradas-wrapper">
<?php
    ///echo $entrada->texto;
    echo "<div class='entrada-num'>";
    echo "<div class='titulo-entrada'>{$entrada->titulo}</a></div>";
    echo "<div class='comentario-entrada'>{$entrada->texto}</div></div>";
    echo "<p id='comentarios'>Comentarios:</p>";
    echo "<div class='comentario-wrapper'>";
    if ($entrada->comentarios){
        foreach($entrada->comentarios as $comentario){
            echo "<div class='entrada-num'>";
            echo "<div class='titulo-entrada'>{$comentario->texto}</div>";
            echo "<div class='comentario-entrada'>{$comentario->fecha_hora}</div>";
            echo "<div class='comentario-entrada'>{$comentario->usuario->nombre}</div></div>";
            
        }
        echo "</div>";
    }
    else{
        echo "<span>No hay comentarios</span>";
    }
?>
<form action="?r=entrada/create" method="post">
    <div id="insertar-comentario">
        <textarea name="comentario[texto]" rows="4" cols="50"></textarea>
        <input type="hidden" name="comentario[aceptado]" value="1">
        <input type="hidden" name="comentario[entradas_id]" value="<?=$entrada->id ?>">
        <input type="submit" name="Enviar">
    </div>
</form>

</div>