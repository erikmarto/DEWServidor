<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use app\models\Apuntes;
use app\models\Grupos;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Estadísticas";
$this->params['breadcrumbs'][] = ['label' => 'Apuntes', 'url' => ['index']];
$this->params['breadcrumbs'][] = "estadísticas";
?>

<div class="apuntes-estadisticas">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <div class="apuntes-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col col-md-3"> 
                <?= $form->field($model, 'grupos_id')->label("Grupo")->dropdownList(ArrayHelper::map(Grupos::find()->all(), 'id', 'nombre'));?>
            </div>
            <div class="col col-md-3"> 
                <?= $form->field($model, 'anyoApunte')->label("Año")->textInput(['type' => 'number']) ?>
            </div>
            <div class="col col-md-3"> 
                <?= $form->field($model, 'mesApunte')->label("Mes")->dropdownList(Apuntes::$opcionesMes) ?>   
            </div>
            <div class="col col-md-3" style="margin-top: 25px"> 
                <?= Html::submitButton('Ver', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

    
  <?= DetailView::widget([
        'model' => $model,
        
        'attributes' => [
            [
            'label'  => 'Grupo',
            'value'  => $model->grupos->nombre],
             [
            'label'  => 'Identificador de grupo',
            'value'  =>$model->grupos->id],
            'mes',
            [
            'label'  => 'Total cargos',
            'value'  => $datos['cargos']." €"],
            [
            'label'  => 'Total abonos',
            'value'  => $datos['abonos']." €"],
            [
            'label'  => 'Total morosidad',
            'value'  => $datos['morosidad']." €"] 
        ],
    ]) ?>    <?php Pjax::end(); ?>
</div>