<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\NuevoAsistentes;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\NuevoAsistentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nuevo-asistentes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clases_id')->label('')->hiddenInput() ?>

    <?= $form->field($model, 'usuarios_id')->label('')->hiddenInput()?>

    
    <?php $options=ArrayHelper::map(NuevoAsistentes::find()->asArray()->all(),'id', 'confirmado'); ?>
    <?= $form->field($model, 'confirmado')->dropDownList($options,['prompt'=>'Seleccione']) ?>

    <div class="form-group">
        <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
