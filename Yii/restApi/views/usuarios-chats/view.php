<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosChats */

$this->title = $model->usuarios_id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Chats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-chats-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'usuarios_id' => $model->usuarios_id, 'chats_id' => $model->chats_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'usuarios_id' => $model->usuarios_id, 'chats_id' => $model->chats_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'usuarios_id',
            'chats_id',
            'ultima_id',
        ],
    ]) ?>

</div>
