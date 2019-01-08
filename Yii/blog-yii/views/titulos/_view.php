<?php
use yii\helpers\Html;

//echo Html::a(Html::encode($model->titulo), ['view', 'id' => $model->id]);
?>
<img src="https://picsum.photos/240/300/?random" />

<?=Html::a(Html::encode($model->titulo), ['view', 'id' => $model->id])?>

<?=Html::a(Html::encode($model->autor->nombre), ['autores/view', 'id' => $model->autor->id])?>

<?=Html::a(Html::encode($model->categoria->nombre), ['categorias/view', 'id' => $model->categoria->id])?>