<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nuevo Asistentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nuevo-asistentes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nuevo Asistentes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'clases_id',
            'usuarios_id',
            'confirmado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
