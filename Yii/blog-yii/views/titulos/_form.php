<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\THtml;
/* @var $this yii\web\View */
/* @var $model app\models\Titulos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titulos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?=THtml::autocomplete($model,'autor_id',['/autores/lookup'], 'autor') ?>

    <?= $form->field($model, 'categoria_id')->textInput() ?>

    <?= $form->field($model, 'coleccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sinopsis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'calificacion')->textInput() ?>

    <?= $form->field($model, 'usuarios_id')->textInput() ?>

    <?= $form->field($model, 'fecha')->widget(yii\jui\DatePicker::className(), 
        ['language' => 'es',
         'dateFormat' => 'dd/MM/yyyy',
         'options' => ['class' => 'form-control']]) ?>

    <?= $form->field($model, 'descargas')->textInput() ?>

    <?= $form->field($model, 'anyo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'portada')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
