<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apuntes */

$this->title = 'Create Apuntes';
$this->params['breadcrumbs'][] = ['label' => 'Apuntes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apuntes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
