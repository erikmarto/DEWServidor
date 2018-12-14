<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    
<div id="entrada<?=$entrada->id?>" class='card list-item'>
            <div class='card-body entrada-card'>
                <div class='entrada-header'>
                    <?php
                        require 'views/blog/subviews/usuario_entrada.php';
                    ?>
                    <h3><a href='?r=blog/entrada&id=<?=$entrada->id?>'><?=$entrada->titulo?></a></h3>
                    <h6 class='text-secondary'><?=$entrada->descripcion_categoria?></h6>
                </div>
                <div class='entrada-texto clearfix'>
                    
                    <?=$entrada->texto?>
                    <p class='float-right'><small><?=$entrada->fecha_hora?></small></p>
                    <span class=" clearfix"></span>
                </div>
                <!-- COMENTARIOS DE LA ENTRADA -->
                <div class="comentarios">
                    <div class="create-comment">
                        <form method="post" action="?r=blog/createComentario&uid=<?=app::instance()::getuser()->id?>">
                                <div class="form-group send-comentario">
                                    <textarea class="form-control" rows="2" name="comentario[texto]" placeholder="Escriba su comentario..."></textarea>
                                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                                </div>
                                <input type="hidden" value="<?=$entrada->id?>" name="comentario[entradas_id]">
                        </form>
                    </div>
                    <?php
                    foreach($comentarios as $comentario) {
                    ?>
                        <div class="comentario">
                            <p>Por: <?=$comentario->nombre?></p>
                            <p><?=$comentario->texto?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>













</div>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
