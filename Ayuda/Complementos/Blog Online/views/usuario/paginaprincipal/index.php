
<!--<table><tr><th>Usuario</th><th>ID</th></tr>

foreach($usuarios as $usuario){
    echo "<tr><td>{$usuario->nombre}</td>";
    echo "<td>{$usuario->id}</td></tr>";
}

<form action="?r=entrada" method="post">
    <input type="submit" value="Entradas" 
         name="entradas" id="frm1_submit" />
</form>
</table>--!

-->
<h1 id="lastnews"> Lo ultimo del blog</h1>
<div id="entradas-wrapper">
<?php
    foreach($entradas as $ent){
        echo "<div class='well'>";
        echo "<div class='titulo-entrada'><a href=?r=entrada/view&id={$ent->id}>{$ent->titulo}</a></div></div>";
       // echo "<div class='comentario-entrada'>{$ent->texto}</div></div>";
    }
?>
</div>