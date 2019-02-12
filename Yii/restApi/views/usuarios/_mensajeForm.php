<?php

use app\models\Chats;
use yii\helpers\Html;
use app\models\Mensajes;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


  $now = date("Y-m-d");
?>



<div class="mensajes-form">

    <?php $form = ActiveForm::begin(['action'=>['mensajes/add']]); ?>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'usuarios_id')->hiddenInput(['value'=>$userId])->label(false); ?>

    <?= $form->field($model, 'chats_id')->hiddenInput(['value'=>$chatId])->label(false); ?>

    <?= $form->field($model, 'fecha')->hiddenInput(['value'=>$now])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>