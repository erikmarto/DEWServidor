<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apuntes */

$this->title = $model->usuario->nombre.": modificar Apunte ".$model->id ;
$this->params['breadcrumbs'][] = ['label' => 'Apuntes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usuario->nombre];
$this->params['breadcrumbs'][] = "apunte".$model->id;
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="apuntes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
