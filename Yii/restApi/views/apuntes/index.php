<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use app\models\Apuntes;
use app\models\Usuarios;
use kartik\typeahead\Typeahead;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apuntes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apuntes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

     <div class="col col-md-3">
        <?= Html::a('Generar Apuntes', ['generarcuotas'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Estadísticas',['estadisticas'], ['class' => 'btn btn-primary']) ?>   
    </div>

    <div class="apuntes-form">

        <?php
        $form = ActiveForm::begin([
            "method" => "get",
            "action" => URL::to(['apuntes/pago']),
        ]);

        echo Html::hiddenInput('id', '', ['id' => 'usuarios_id-hidden']);
        ?>
        <div class="col col-md-4">

            <?php
            echo Typeahead::widget([
                'name' => 'nombre',
                'options' => array_merge(['placeholder' => 'Busca por nombre de usuario']),
                'pluginOptions' => ['highlight' => true],
                'pluginEvents' => [
                    "typeahead:select" => 'function(ev, resp) {
			$("#usuarios_id-hidden").val(resp.id);
			$("#usuarios_id-hidden").change();
		}',
                ],
                'dataset' => [
                    [
                        'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('id')",
                        'display' => 'label',
                        'remote' => [
                            'url' => Url::to(['usuarios/lookup']) . '&term=%QUERY',
                            'wildcard' => '%QUERY'
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
           
             <div class="col col-md-3">
            <?= Html::submitButton('Generar Pagos', ['class' => 'btn btn-success']) ?>   
             </div>
            <?php ActiveForm::end(); ?>
         
        
        </div>

        <br>
        <br>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
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
                    'filter'=>Apuntes::$tipoOptions,
                    'value' => function ($model) {
                       return Apuntes::$tipoOptions[$model->tipo];
                    }
                ],
                'importe',
                'concepto',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
