<?php

use app\models\Salas;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\grid\CheckboxColumn;
use yii\helpers\ArrayHelper;
use app\models\Clases;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Clase', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Calendario', ['salas/calendario'], ['class' => 'btn btn-success']) ?>
    </p>
    

    <!-- Form cambiar de sala / Anular sala --->
    <?=Html::beginForm(['/clases/multiple'],'post');?>

    <?='<div class="botonCambiarSalaAnular">'?>

    <?php $options = ArrayHelper::map(Salas::find()->asArray()->all(), 'id', 'nombre'); ?>

    <?=Html::dropDownList('sala','',['Salas' => $options],['class'=>'form-control',])?>

    <?=Html::submitButton('Cambiar', ['class' => 'btn btn-primary', 'value'=>'cambiar', 'name' => 'accion']);?>

    <?='&emsp;'?>

    <?=Html::submitButton('Anular', ['class' => 'btn btn-danger botonAnular', 'value'=>'anular', 'name' => 'accion']);?>

    <?='</div><br><br>'?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'id',
            'fecha',
            'hora1',
            'hora2',
            ['attribute'=>'salas.nombre','label'=>'Salas'],
            ['attribute'=>'grupo.nombre','label'=>'Grupos'],
            ['class' => 'yii\grid\ActionColumn'],
            ['class' => CheckboxColumn::className(),'name'=>'idselec',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id];
                            }
            ],
        ],
    ]); ?>

    <?= Html::endForm();?>

    <?php Pjax::end(); ?>
</div>
