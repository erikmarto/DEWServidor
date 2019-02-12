<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\HtmlPurifier;
?>
<div class="row">
    <?php if (Yii::$app->user->identity->id == $model->usuarios_id) {?>
    <div class="pull-right">

        <?php } else {?>
        <div class="pull-left">
            <?php }
?>

            <?=Html::encode($model->fecha)?>
            <?=HtmlPurifier::process($model->texto)?>
            <?=Html::encode($model->usuarios->nombre)?>
        </div>
    </div>
