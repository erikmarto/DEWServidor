
<div class="bodyEntradas">
    <h3> Entradas </h3>
<?php

foreach($entradas as $row){
?>

    <div class="card card-entradas">
    <div class="card-header">
    POR ACTIVAR
    </div>
    <div class="card-body">
        <p class="card-text"><?=$row->texto?></p>
        <?= Mhtml::actionlink('usuarios/activar',"Aceptar",['id'=>$row->id],'btn btn-dark'); ?>
    </div>
    </div>
    
<?php
}
?>

</div>
