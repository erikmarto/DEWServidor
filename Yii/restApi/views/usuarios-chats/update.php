<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosChats */

$this->title = 'Update Usuarios Chats: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Chats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usuarios_id, 'url' => ['view', 'usuarios_id' => $model->usuarios_id, 'chats_id' => $model->chats_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-chats-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
