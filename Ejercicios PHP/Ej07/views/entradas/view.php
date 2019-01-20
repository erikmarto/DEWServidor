
<div class="card card-entradas">
	<div class="card-header"><?=$entrada->nombre?></div>
    <div class="card-body">
        <h5 class="card-title"><?= $entrada->descripcion_categoria?></h5>
        <p class="card-text"><?=$entrada->texto?></p>
    </div>
    </div>

<?php

foreach(comentarios::findAll('entradas_id='.$entrada->id) as $row){?>
    <!-- Contenedor Principal -->
	<div class="comments-container">
		<ul id="comments-list" class="comments-list">
			<li>
				<div class="comment-main-level">
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name by-author">
                                <?php 
                                    foreach(usuarios::findAll("id = ".$row->usuarios_id) as $us){
                                        echo $us;
                                    }
                                ?>
                            </h6>
						</div>
						<div class="comment-content"><?=$row->texto?></div>
					</div>
				</div>
			</li>
		</ul>
	</div>

 <?php       
}

if(app::instance()->isLogued()){
?>
    <form method="post" action="?r=comentarios/create">
		<textarea class="form-control" rows="3" placeHolder="Añade tu comentario" name="comentario[texto]"></textarea>
		<input type="hidden" name="comentario[usuarios_id]" value="<?=app::instance()->user->id?>">
		<input type="hidden" name="comentario[aceptado]" value="1">
		<input type="hidden" name="comentario[entradas_id]" value="<?=$entrada->id?>">
		<hr>
        <button type="submit" class="btn btn-dark">Añadir</button>
    </form>
<?php
}
?>

