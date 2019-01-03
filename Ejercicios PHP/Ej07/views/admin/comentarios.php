<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    <h1 class="display-4">Panel de administrador</h1>
    <p class="lead">aprobar comentarios</p>
    <hr class="header-separator">
    <form method="post" action="?r=admin/ApproveComentarios">
        <h4 class="text-center">Comentarios por aprobar</h4>
        <div class="list-container pending-approval-container">
            <div class="pending-approval-list">
                <?php
                    foreach($comentarios as $comentario) {
                ?>
                    <div class='card list-item'>
                        <div class='card-body entrada-card'>
                            <div class='entrada-header'>
                                <p class="lead d-inline-block"><!--<a href='?r=user/userinfo&id='>--><?=$comentario->nombre?><!--</a>--></p>
                                <input type="checkbox" class="approval-checkbox float-right" name="comentarios[]" value="<?=$comentario->id?>">
                            </div>
                            <div class='entrada-texto clearfix'>
                                
                                <?=$comentario->texto?>
                                <p class='float-right'><small><?=$comentario->fecha_hora?></small></p>
                                <span class=" clearfix"></span>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
        <div class="text-center send-btn-container">
            <button class="btn btn-success">Aprobar comentarios</button>
        </div>
    </form>
</div>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>