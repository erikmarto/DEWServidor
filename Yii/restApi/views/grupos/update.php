<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grupos */

$this->title = 'Actualizar Grupo: '. $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>

<div class="grupos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
