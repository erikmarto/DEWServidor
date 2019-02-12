<?php

use yii\helpers\Html;
use app\models\Mensajes;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Chats */

/* $this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Chats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title; */
?>
<style>

    .mensajes{
        height: 300px;
        overflow: scroll;
        overflow-x: hidden;
    }
</style>
<div class="chats-view">
<div class="container">
<h3><?= $model->nombre ?></h3>

    <!-- <div id="mensajes" class="mensajes"> -->
        <?php
            foreach($model->getMensajes()->orderBy('fecha asc')->all() as $mensaje){
                echo $this->render('/mensajes/view', ['model' => $mensaje]);
            }

            $mensaje = new Mensajes;
            $mensaje->chats_id = $model->id;
        ?>
    <!-- </div> -->

    <?= $this->render('/mensajes/create', ['model' => $mensaje]) ?>
</div>
    

</div>
