
<div class="bodyEntradas">

<?php
foreach($entradas as $row){
?>

    <div class="card card-entradas">
    <div class="card-header">
        <?=$row->nombre?>
    </div>
    <div class="card-body">
        <h5 class="card-title">
        <?= $row->descripcion_categoria?>
        </h5>
        <p class="card-text"><?=$row->texto?></p>
        <?= Mhtml::actionlink('entradas_cat_usu/view',"Comentarios",['id'=>$row->id],'btn btn-dark'); ?>
    </div>
    </div>
    
<?php
}
?>

</div>
