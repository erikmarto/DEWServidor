<div class="create-comment">
    <form method="post" action="?r=blog/createComentario&uid=<?=app::instance()->getuser()->id?>">
            <div class="form-group send-comentario">
                <textarea class="form-control" rows="2" name="comentario[texto]" placeholder="Escriba su comentario..."></textarea>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </div>
            <input type="hidden" value="<?=$entrada->id?>" name="comentario[entradas_id]">
    </form>
</div>