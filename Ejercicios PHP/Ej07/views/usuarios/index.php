<?php
$usuario = app::instance()->user;
?>

<div class="card">
  <div class="container">
    <h4><b><?=$usuario->nombre?></b></h4> 
    <p><?=$usuario->email?></p> 
  </div>
</div>
<hr>

<?php


if(app::instance()->user->usuario == "admin"){
    Mhtml::actionlink('usuarios/viewAdmin',"Panel de Control",[],'btn btn-dark'); 
}
  


foreach(entradas::findAll("aceptado = 1 and usuarios_id=".$usuario->id, 'id DESC') as $row){?>
<div class="card card-entradas">
    <div class="card-header"><?=$row->id?></div>
    <div class="card-body">
        <h5 class="card-title">
        <?php 
        foreach(categorias::findAll("id = ".$row->categorias_id) as $cat){
            echo $cat->descripcion;
        }
        ?>
        </h5>
        <p class="card-text"><?=$row->texto?></p>
        <?= Mhtml::actionlink('entradas_cat_usu/view',"Ver comentarios",['id'=>$row->id],'btn btn-dark'); ?>
    </div>
  </div>

<?php
} 
?>