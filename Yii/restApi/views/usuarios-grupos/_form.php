<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosGrupos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-grupos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuarios_id')->textInput() ?>

    <?= $form->field($model, 'grupos_id')->textInput() ?>

    <?= $form->field($model, 'cuota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_alta')->textInput() ?>

    <?= $form->field($model, 'fecha_baja')->textInput() ?>

    <?= $form->field($model, 'rol')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
