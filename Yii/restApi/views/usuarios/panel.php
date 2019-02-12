<h2> Panel de usuario </h2>
<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin();
echo GridView::widget([
    'dataProvider' => $asistentes,
    'columns' => [
        'clase.fecha',
        'clase.grupo.nombre',
        'clase.hora1',
        [
            'format' => 'raw',
            'value' => function ($model) {
            
                return Html::a('Ver Clase', ['usuarios/miclase', 'id' => $model->clases_id], ['class' => 'button btn ']);
            },
        ],
    ],
]);

Pjax::end();
