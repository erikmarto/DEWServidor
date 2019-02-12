<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use app\models\Apuntes;
use app\models\Usuarios;
use app\models\Grupos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Pagos";
$this->params['breadcrumbs'][] = ['label' => 'Apuntes', 'url' => ['index']];
$this->params['breadcrumbs'][] = "pago";
?>
<div class="apuntes-pago">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <br>
    <div class="apuntes-form">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col col-md-2"> 
                <?= $form->field($model, 'tipo')->label("Tipo")->dropdownList(Apuntes::$tipoOptions) ?>
            </div>
            <div class="col col-md-2"> 
                <?= $form->field($model, 'importe')->label("Importe (€)")->textInput(['type' => 'number']) ?>
            </div>
            <div class="col col-md-2">
                <?= $form->field($model, 'concepto')->label("Concepto")->textInput() ?>
            </div>   

            <div class="col col-md-3"> 
                <?= $form->field($model, 'grupos_id')->label("Grupo")->dropdownList(ArrayHelper::map(Grupos::find()->all(), 'id', 'nombre')); // CAMBIAR A DROPDOWN  ?>
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
        <br>
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <br>   


    <?=
    GridView::widget([        
        'dataProvider' =>  $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            ['attribute' => 'fecha',
                    'label' => 'Fecha',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return $model->fecha=date("d/m/Y", strtotime($model->fecha));
                    }],
            ['attribute' => 'mes',
                    'label' => 'mes',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return $model->mes=date("d/m/Y", strtotime($model->mes));
                    }],
            ['attribute' => 'usuario_nombre',
                'label' => 'Usuario',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->usuario->nombre;
                }
            ],
            ['attribute' => 'tipo',
                    'label' => 'Tipo',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Apuntes::$tipoOptions[$model->tipo];
                    }
                ],
            'importe',
            'concepto',
            
            //'grupos_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
       
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
