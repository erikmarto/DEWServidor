<?php

use yii\grid\GridView;
use yii\helpers\Html;




echo GridView::widget([
    'dataProvider' => $chats,
    'columns' => [
        'grupos.nombre',
        [
            'format' => 'raw',
            'value' => function ($model) {
                return Html::a('Ver Chat', ['usuarios/mensajes', 'id' => $model->id], ['class' => 'button btn ']);
            },
        ],
    ],
]);