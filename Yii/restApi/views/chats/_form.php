<?php

use yii\web\View;
use app\models\Chats;
use yii\helpers\Html;
use app\models\Grupos;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Chats */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chats-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->dropDownList(Chats::$tipoOptions,['prompt' => 'Selecciona...']) ?>
    <?php $options=ArrayHelper::map(Grupos::find()->asArray()->all(), 'id', 'nombre'); ?>

    <?= $form->field($model, 'grupos_id')->dropDownList($options, ['prompt' => 'Selecciona...']) ?>
    <div class="form-group">
        <?= Html::submitButton('Creal', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
