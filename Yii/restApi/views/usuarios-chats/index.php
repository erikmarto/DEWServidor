<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios Chats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-chats-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usuarios Chats', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'usuarios_id',
            'chats_id',
            'ultima_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
