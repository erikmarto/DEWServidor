<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Grupos;
use app\models\Salas;
use kartik\date\DatePicker;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
?>

<div class="grupos-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col col-md-3"></div>        
        <div class="col col-md-6">
            <?php
                $options = ArrayHelper::map(Grupos::find()->asArray()->all(), 'id', 'nombre');
                echo $form->field($model, 'grupos_id')->dropDownList($options, ['promt' => 'Selecciona Grupo']);
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col col-md-3"></div>
        <div class="col col-md-3">
            <?= $form->field($model, 'fecha1')->widget(DateControl::classname(),['pluginOptions' => ['autoclose'=>true]]); ?>
        </div>

        <div class="col col-md-3">
            <?= $form->field($model, 'fecha2')->widget(DateControl::classname(),['pluginOptions' => ['autoclose'=>true]]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-3"></div>
        <div class="col col-md-6">
            <?php
                $options = ArrayHelper::map(Salas::find()->asArray()->all(), 'id', 'nombre');
                echo $form->field($model, 'salas_id')->dropDownList($options, ['promt' => 'Selecciona Sala']);
            ?>            
        </div>      
    </div> 
    
    <div class="row">
        <div class="col col-md-3"></div>
        <div class="col-md-6">
            <?= Html::submitButton('Crear Clases', ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>