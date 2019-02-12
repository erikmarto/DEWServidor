<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosChats */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-chats-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuarios_id')->textInput() ?>

    <?= $form->field($model, 'chats_id')->textInput() ?>

    <?= $form->field($model, 'ultima_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
