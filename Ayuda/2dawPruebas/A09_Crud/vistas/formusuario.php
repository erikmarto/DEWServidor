<h3><?= $usuario->_isnew ? 'Alta ' : 'Modificación' ?> </h3>
<form method='post'>
<?php
if($usuario->errores) {
    echo '<div class="alert alert-danger"><ul><li>';
    echo implode('<li>',$usuario->errores);
    echo '</ul></div>';
}
?>
    <label>Nombre</label><br> 
    <input name='nombre' size='40' value='<?=$usuario->nombre?>'><br>
    <p>
        
    <label>e-mail</label><br> 
    <input name='email' size='40' value='<?=$usuario->email?>'><p>
        
    <label>Password</label><br> 
    <input name='password' size='20' type='password' value='<?=$usuario->password?>'><p>
        
<?php if(!$usuario->_isnew)  { ?>      
    <label>Estado</label><br> <select name='estado'>
       <option value="">Selecciona...</option>
       <?php 
            foreach(Usuario::$estados as $valor=>$label) : ?>
             <option value='<?=$valor?>' <?= $usuario->estado==$valor?'selected':''?> >
                    <?=$label?>
             </option>
        <?php endforeach;?>
    </select>
<?php } ?>    
    <p>
    <input type='submit' name="actualiza" value="Guardar" class='btn btn-success'>
    
</form>    
</body></html>