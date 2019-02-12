<?php

use \app\models\ApuntesForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Grupos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Apuntes */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Generar Apuntes';
$this->params['breadcrumbs'][] = ['label' => 'Apuntes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'generarcuotas';
?>

<div class="apuntes-form">

    <h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col col-md-2">    
<?= $form->field($model, 'anyo')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col col-md-2">
<?= $form->field($model, 'mes')->dropdownList(ApuntesForm::$optionsmes) // CAMBIAR A DROPDOWN  ?>
        </div>
    </div>
<?= $form->field($model, 'grupos_id')->checkboxList(ArrayHelper::map(Grupos::find()->all(), 'id', 'nombre')); // CAMBIAR A DROPDOWN  ?>

    <div class="form-group">
<?= Html::submitButton('Generar', ['class' => 'btn btn-success', 'name' => 'generar']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
