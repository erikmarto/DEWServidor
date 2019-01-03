<script type="text/javascript" src="js/native/entradas.js"></script>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    <?php
    switch ($action) {
        case 'index': 
        case 'search': 
            require 'views/blog/subviews/index_header.php';
        break;
        case 'userblog':
            require 'views/blog/subviews/userblog_header.php';
        break;

    }
    ?>
    <!-- ENTRADAS -->
    <div class="list-container entradas">
    <?php
    foreach($entradas as $entrada) {
    ?>
        <div id="entrada<?=$entrada->id?>" class='card list-item'>
            <div class='card-body entrada-card'>
                <div class='entrada-header'>
                    <?php
                        if ($action != 'userblog') {
                            require 'views/blog/subviews/usuario_entrada.php';
                        }
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
                if (count($comentarios[$entrada->id]) || app::instance()->isLogged()) {
                ?>  
                    <div id="toggle-comments<?=$entrada->id?>" class="comment-toggler">
                            <p class="text-center show-comments">Mostrar comentarios (<?=count($comentarios[$entrada->id])?>)</p>
                        </div>
                    <div id="comments<?=$entrada->id?>" class="comentarios comments-dropdown">
                        
                        <ul class="comments-list">
                        <?php
                        foreach($comentarios[$entrada->id] as $comentario) {
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
                                        <div class="comment-content"><?=$comentario->texto?></div>
                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                        echo "</ul>";
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

    <?php
    }
    ?>
    </div>
</div>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>