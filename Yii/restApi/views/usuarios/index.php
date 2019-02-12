<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Usuarios;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(['timeout' => 10000 ]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Usuarios'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'fichero_foto',
                'label' => 'Foto',
                'format' => 'raw',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['width' => '100px'],
                'value' => function($data) {
                    return "<div style='width:80px;height:80px; background: url($data->picture) no-repeat center/contain;'>";
                }
            ],
            'nombre',
            'usuario',
            'email:email',
            //'fecha_alta',
            //'fecha_baja',
            //'estado',
            //'telefono',
            //'origen',
            'observ:ntext',
            //'ult_fecha',
            //'roles',

            //'token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'rowOptions' => function ($model, $key, $index, $grid) {
            $class=$index%2?'odd':'even';
            return ['key'=>$key,'index'=>$index,'class'=>$class];
        },
    ]); ?>
    <?php Pjax::end(); ?>
</div>
