<?php

use yii\web\View;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model app\models\Mensajes */

//$this->title = $model->id;
/* $this->params['breadcrumbs'][] = ['label' => 'Mensajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title; */


?>
<style>
    .mensaje{
        height: auto;
        overflow: hidden;
    }
</style>


<!-- <div class="mensajes-view"> -->
<div class="container">
<div class=" row ">
    <?php if (Yii::$app->user->identity->id == $model->usuarios_id) {?>
    <div class="pull-right mensaje alert bg-success">

        <?php } else {?>
        <div class="pull-left alert bg-primary">
            <?php }
?>

            <?=Html::encode($model->fecha)?>
            <?=HtmlPurifier::process($model->texto)?>
            <?=Html::encode($model->usuarios->nombre)?>
            <?= Html::a('', ['/mensajes/reenviar', 'id' => $model->id], ['class' => 'btn-info btn-xs glyphicon glyphicon-share-alt']); ?>
        </div>
    </div>
<!-- </div> -->
    
</div>



     

</div>
