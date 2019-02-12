<?php

use app\models\Salas;
use yii\helpers\Html;
use app\models\Grupos;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Clases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clases-form">

<?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col col-md-4">
        <?= $form->field($model, 'fecha')->widget(DateControl::classname(),['pluginOptions' => ['autoclose'=>true]])  ?>
        </div>

        <div class="col col-md-4">
            <?= $form->field($model, 'hora1')->textInput() ?>
        </div>

        <div class="col col-md-4">
            <?= $form->field($model, 'hora2')->textInput() ?>
        </div>

        <div class="col col-md-6">
            <?php $options = ArrayHelper::map(Salas::find()->asArray()->all(), 'id', 'nombre'); ?>
            <?= $form->field($model, 'salas_id')->label('Elige sala')->dropDownList($options, ['prompt'=>'Selecciona...']); ?>
        </div>

        <div class="col col-md-6">
            <?php $options = ArrayHelper::map(Grupos::find()->asArray()->all(), 'id', 'nombre'); ?>
            <?= $form->field($model, 'grupos_id')->label('Elige grupo')->dropDownList($options, ['prompt'=>'Selecciona...']); ?>
        </div>

    </div>    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
