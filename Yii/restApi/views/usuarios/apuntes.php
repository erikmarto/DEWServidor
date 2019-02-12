<?php

use yii\helpers\Html;
use yii\grid\GridView;


echo GridView::widget([
        'dataProvider' => $apuntes,
        'columns' => [
            'usuario.nombre',
            'importe',
            'concepto',
            'mes'
        ]
]); 

?>