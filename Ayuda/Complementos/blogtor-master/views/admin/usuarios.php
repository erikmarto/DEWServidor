<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    <h1 class="display-4">Panel de administrador</h1>
    <p class="lead">aprobar usuarios</p>
    <hr class="header-separator">
    <form method="post" action="?r=admin/ApproveUsuarios">
        <h4 class="text-center">Usuarios por aprobar</h4>
        <div class="list-container pending-approval-container">
            <div class="pending-approval-list">
                <?php
                    foreach($usuarios as $usuario) {
                ?>
                    <div class='card list-item'>
                        <div class='card-body entrada-card'>
                            <div class='entrada-header'>
                                <p class="lead d-inline-block"><?=$usuario->usuario?></p>
                                <input type="checkbox" class="approval-checkbox float-right" name="usuarios[]" value="<?=$usuario->id?>">
                            </div>
                            <div class='entrada-texto clearfix'>
                                <p><?=$usuario->nombre?></p>
                                <p><?=$usuario->email?></p>
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
            <button class="btn btn-success">Aprobar usuarios</button>
        </div>
    </form>
</div>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>