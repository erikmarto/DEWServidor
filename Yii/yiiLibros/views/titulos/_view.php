<?php
use yii\helpers\Html;
Html::a(Html::encode($model->titulo), ['view', 'id' => $model->id])

?>

<div class="well">  
<img src="https://imagessl8.casadellibro.com/a/l/t1/68/9788499284668.jpg" width="110px" height="110px"> 
    <div id="contenido_titulos">
        <p>Titulo: <?=Html::a(Html::encode($model->titulo), ['view', 'id' => $model->id]);?></p>
        <p>Autor: <?=Html::a(Html::encode($model->autor->nombre), ['autores/view', 'id' => $model->autor->id]);?> </p>
        <p>Categoria: <?=Html::a(Html::encode($model->categoria->nombre), ['categorias/view', 'id' => $model->categoria_id]);?> </p>
   </div>
</div>