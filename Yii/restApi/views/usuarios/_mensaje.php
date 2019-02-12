<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="row">
    <?php if (Yii::$app->user->identity->id == $model->usuarios_id) {?>
    <div class="pull-right mensaje alert bg-success">

        <?php } else {?>
        <div class="pull-left mensaje alert bg-primary">
            <?php }
?>

            <?=Html::encode($model->fecha)?>
            <?=HtmlPurifier::process($model->texto)?>
            <?=Html::encode($model->usuarios->nombre)?>
        </div>
    </div>