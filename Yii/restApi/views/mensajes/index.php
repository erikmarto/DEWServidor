<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Mensajes;
use app\components\Thtml;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mensajes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mensajes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Mensajes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha',
            'texto:ntext',
            'chats_id',
            'usuarios.nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
