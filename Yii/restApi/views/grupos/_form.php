<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Grupos;
use app\models\Salas;
use app\models\Actividades;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Grupos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupos-form">

    <?php $form = ActiveForm::begin(); ?>
    <hr>
    <div class="row">
        <div class="col col-md-6">
            <?= $form->field($model, 'nombre')->textInput(); ?>
        </div>

        <div class="col col-md-6">
            <?php
                $options = ArrayHelper::map(Actividades::find()->asArray()->all(), 'id', 'actividad');
                echo $form->field($model, 'actividades_id')->dropDownList($options, ['promt' => 'Selecciona Actividad']);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-3">
            <?= $form->field($model, 'fecha_inicio')->widget(DateControl::classname(),['pluginOptions' => ['autoclose'=>true]]); ?>
        </div>

        <div class="col col-md-3">
            <?= $form->field($model, 'fecha_fin')->widget(DateControl::classname(),['pluginOptions' => ['autoclose'=>true]]); ?>
        </div>

        <div class="col col-md-3">
            <?= $form->field($model, 'hora1')->textInput() ?>
        </div>

        <div class="col col-md-3">
            <?= $form->field($model, 'hora2')->textInput() ?>
        </div>
    </div>   

    <div class="row">
        <div class="col col-md-3">           
            <?= $form->field($model, 'estado')->dropDownList(Grupos::$estadosGrupos); ?>
        </div>

        <div class="col col-md-3">
            <?php
                $options = ArrayHelper::map(Salas::find()->asArray()->all(), 'id', 'nombre');
                echo $form->field($model, 'salas_id')->dropDownList($options, ['prompt'=>'Selecciona Sala']);
            ?>
        </div>

        <div class="col col-md-3">
            <?= $form->field($model, 'plazas')->textInput() ?>
        </div>

        <div class="col col-md-3">
            <?= $form->field($model, 'cuota')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-12">
            <?= $form->field($model, 'dias_semana')->checkBoxList(Grupos::$dias); ?>
        </div>
    </div> 

    <div class="row">
        <div class="col col-md-3">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
