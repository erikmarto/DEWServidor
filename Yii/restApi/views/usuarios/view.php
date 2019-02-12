<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuarios-view">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="avatar-container">
        <div class="avatar">
            <div id="imgView" style="background-image: url(<?=$model->getPicture()?>);"></div>
        </div>

    </div>

    <p class="text-center">
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '¿Seguro que quiere borrar este usuario?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Restablecer Contraseña'), ['send-reset-mail', 'id' => $model->id], [
            'class' => 'btn btn-warning',
            'data' => [
                'confirm' => Yii::t('app', '¿Seguro que quiere mandar un correo de reestablecimiento de contraseña a este usuario?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'usuario',
            'nombre',
            'email:email',
            'fecha_altaText',
            'fecha_bajaText',
            [
                'attribute' => 'estado',
                'label' => 'Estado',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->estado === 'A' ? 'Activo' : 'Inactivo';
                }
            ],
            'telefono',
            'observ:ntext',
            'ult_fechaText',
            'roles',
            //'picture',
            //'token',
        ],
    ]) ?>

</div>
