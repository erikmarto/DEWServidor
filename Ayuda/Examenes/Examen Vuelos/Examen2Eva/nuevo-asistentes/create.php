<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NuevoAsistentes */

$this->title = 'Create Nuevo Asistentes';
$this->params['breadcrumbs'][] = ['label' => 'Nuevo Asistentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nuevo-asistentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
