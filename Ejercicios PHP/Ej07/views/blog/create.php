<?php
    require 'views/blog/components/froala_editor_imports.php';
?>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    <h1 class="display-4">Crea una nueva entrada</h1>
    <p class="lead">Para compartir con el mundo</p>
    <hr class="header-separator">
    
    <form method="post" action="?r=blog/create">
        <div class="form-group">
            <select id="categorias" class="form-control" name="entrada[categorias_id]">
            <?php
                foreach($categorias as $categoria) {
                    echo "<option value=".$categoria->id.">".$categoria->descripcion."</option>";
                }
            ?>
            </select>
            <label for="input-titulo">Titulo:</label>
            <input type="text" class="form-control" id="input-texto" name="entrada[titulo]" value="<?=$entrada->titulo ?? ''?>">
            <label for="input-entrada">Escriba su entrada aquí: </label>
            <textarea class="form-control" id="froala-editor" rows="5" name="entrada[texto]"><?=$entrada->texto ?? ''?></textarea>
            <button id="sendEntry" class="btn btn-success">Enviar</button>
        </div>

    </form>
    
</div>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>