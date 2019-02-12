<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\jui\AutoComplete;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apuntes */

$this->title = $model->usuario->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Apuntes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = "apunte ".$model->id;
?>
<div class="apuntes-view">

    <h1><?= Html::encode($this->title.": Apunte ".$model->id) ?></h1>
           
            

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'usuario.nombre',
            'importe',
            'grupos.nombre',
            'fecha',
            'grupos_id',
            'mes'
        ],
    ]) ?>
    
      <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
