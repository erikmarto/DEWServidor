<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios Grupos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-grupos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usuarios Grupos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'usuarios_id',
            'grupos_id',
            'cuota',
            'fecha_alta',
            //'fecha_baja',
            //'rol',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
