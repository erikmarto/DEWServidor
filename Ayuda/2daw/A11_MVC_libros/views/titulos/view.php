<div style='float:left'>
<img src='<?=$titulo->image?>' width='100%'>
</div>
<div style='float:left;background-color:#aee;width:70%;margin-left:10px;padding:8px'>
<?php
	Mhtml::verticalview($titulo,array("titulo","autor","categoria","sinopsis","anyo"));


foreach($titulo->comentarios as $comentario){
	echo '<hr>'.$comentario->fecha.': '.$comentario.texto;

}
?>
<b>Otros títulos del mismo autor:</b><br>

<?php
foreach($titulo->autor->titulos as $t){
    if($t->id!=$titulo->id)
        echo Mhtml::actionlink('titulos/view',$t->titulo,['id'=>$t->id]).' &nbsp;';

}
echo ' <br><br>';
if(app::instance()->checkrole('AD'))
	echo MHtml::actionlink('titulos/update','Modificar',array('id'=>$titulo->id),'button');
else
	echo MHtml::actionlink('carrito/anadir','Añadir al carrito',array('id'=>$titulo->id),'button');
?>
</div>
