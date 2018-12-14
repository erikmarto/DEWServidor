<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    <?php
    switch ($action) {
        case 'index':  
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
                        if ($action == 'index') {
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
                    <div class="comments-container">
                        <?php
                        foreach($comentarios[$entrada->id] as $comentario) {
                        ?>
                            <ul id="comments-list" class="comments-list">
                                <li>
                                    <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="images/profile-pictures/default-profile-pic.png" alt=""></div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name by-author">
                                                    <?=$comentario->nombre?>
                                                </h6>
                                            </div>
                                            <div class="comment-content"><?=$comentario->texto?></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php
                        }
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