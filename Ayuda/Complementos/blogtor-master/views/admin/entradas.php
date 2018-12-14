<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    <h1 class="display-4">Panel de administrador</h1>
    <p class="lead">aprobar entradas</p>
    <hr class="header-separator">
    <form method="post" action="?r=admin/ApproveEntradas">
        <h4 class="text-center">Entradas por aprobar</h4>
        <div class="list-container pending-approval-container">
            <div class="pending-approval-list">
                <?php
                    foreach($entradas as $entrada) {
                ?>
                    <div class='card list-item'>
                        <div class='card-body entrada-card'>
                            <div class='entrada-header'>
                                
                                <h3 class="d-inline-block"><a href='?r=blog/entrada&id=<?=$entrada->id?>'><?=$entrada->titulo?></a></h3>
                                <input type="checkbox" class="approval-checkbox float-right" name="entradas[]" value="<?=$entrada->id?>">
                                <h6 class='text-secondary'><?=$entrada->descripcion_categoria?></h6>
                            </div>
                            <div class='entrada-texto clearfix'>
                                
                                <?=$entrada->texto?>
                                <p class='float-right'><small><?=$entrada->fecha_hora?></small></p>
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
            <button class="btn btn-success">Aprobar entradas</button>
        </div>
    </form>
</div>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>