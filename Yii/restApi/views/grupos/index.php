<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grupos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="grupos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Grupo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            'actividades.actividad',
            'fecha_inicioText',
            'fecha_finText',
            'dias_semanaText',
            'hora1',
            'hora2',
            //'estado',
            //'cuota',
            'salas.nombre:ntext:Sala',
            //'plazas',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {copy}',
                'buttons' => [
                    //sustituto boton para crear clases
                    'copy' => function ($url, $model) {
                        $url=Url::toRoute(['crearclases','id'=>$model->id]);
                        return Html::a('<span class="glyphicon glyphicon-flash" aria-hidden="true" title=Clases></span>',$url);
                    },
                ],
            ],  
        ],
    ]);
    ?>
</div>
