<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Apuntes;
use app\models\Grupos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Apuntes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apuntes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col col-md-2"> 
            <?= $form->field($model, 'tipo')->label("Tipo")->dropdownList(Apuntes::$tipoOptions) ?>
        </div>

        <div class="col col-md-2"> 
            <?= $form->field($model, 'importe')->label("Importe (€)")->textInput(['type' => 'number']) ?>
        </div>
        <div class="col col-md-3"> 
            <?= $form->field($model, 'grupos_id')->label("Concepto")->dropdownList(ArrayHelper::map(Grupos::find()->all(), 'id', 'nombre')); // CAMBIAR A DROPDOWN  ?>
        </div>
    </div>
    <div class="row">
    <div class="col col-md-2"> 
        <?= $form->field($model, 'anyoApunte')->label("Año")->textInput(['type' => 'number']) ?>
    </div>

    <div class="col col-md-2"> 
        <?= $form->field($model, 'mesApunte')->label("Mes")->dropdownList(Apuntes::$opcionesMes) ?>
    </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
