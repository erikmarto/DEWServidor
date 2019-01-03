<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    <div class="list-container entradas">
        <div id="entrada<?=$entrada->id?>" class='card list-item'>
            <div class='card-body entrada-card'>
                <div class='entrada-header'>
                    <?php
                    require 'views/blog/subviews/usuario_entrada.php';
                    ?>
                    <h3><a href='?r=blog/entrada&id=<?=$entrada->id?>'><?=$entrada->titulo?></a></h3>
                    <h6 class='text-secondary d-inline-block'><?=$entrada->descripcion_categoria?></h6>
                    <p class="d-inline-block float-right"><small><?=$entrada->fecha_hora?></small></p>
                </div>
                <div class='entrada-texto clearfix'>
                    
                    <?=$entrada->texto?>
                </div>
                <!-- COMENTARIOS DE LA ENTRADA -->
                <?php
                if (isset($comentarios) && count($comentarios) || app::instance()->isLogged()) {
                ?>  
                    <div class="comentarios comments-dropdown">
                        
                        <ul class="comments-list">
                            <?php
                            foreach($comentarios as $comentario) {
                            ?>
                                <li>
                                    <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class='entry-avatar d-inline-block'>
                                            <div style='background-image: url(<?=$comentario->usuario->profile_pic_path?>)'></div>
                                        </div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name <?=$entrada->usuarios_id == $comentario->usuarios_id?'by-author':''?> d-inline-block">
                                                    <a href="?r=user/userinfo&id=<?=$comentario->usuario->id?>"><?=$comentario->usuario->nombre?></a>
                                                </h6>
                                                <p class="d-inline-block float-right"><small><?=$comentario->fecha_hora?></small></p>
                                            </div>
                                            <div class="comment-content">
                                                <?=$comentario->texto?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <?php
                        if (app::instance()->isLogged()) {
                            require 'views/blog/subviews/create_comment.php';
                        }
                        ?>
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
