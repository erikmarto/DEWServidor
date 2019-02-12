<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <div class="row">
        <div class="col col-md-3">
            <?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col col-md-3">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col col-md-3">
            <?= $form->field($model, 'roles')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col col-md-3">
            <?= $form->field($model, 'estado')->dropDownList(['A' => 'Activo', 'B' => 'Inactivo']) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col col-md-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col col-md-3">
            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col col-md-3">
            <?= $form->field($model, 'origen')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col col-md-3">
            <?= $form->field($model, 'fecha_alta')->widget(DateControl::classname(),['pluginOptions' => ['autoclose'=>true]])  ?>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-6">
            <?=($model->isNewRecord) ? $form->field($model, 'password')->passwordInput(['maxlength' => true]) : '' ?>
        </div>
        <div class="col col-md-6">
            <?=($model->isNewRecord) ? $form->field($model, 'password2')->passwordInput(['maxlength' => true]) : '' ?>
        </div>
    </div>

    <?= $form->field($model, 'observ')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
