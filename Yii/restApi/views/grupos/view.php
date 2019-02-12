<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Grupos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="grupos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres eliminar el grupo?',
                'method' => 'post'
            ],
        ]); ?>
    </p>

    <?= 
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'nombre',
            'actividades.actividad',
            'horario',
            //'fecha_inicioText',
            //'fecha_finText',
            'dias_semanaText',            
            //'hora1Text',
            //'hora2Text',
            'estadoText',
            'cuota',
            //'salas_id',
            'plazas',
            [
                'type'=>'raw',
                'label'=>'Profesores',
                'value'=>count($model->getUsuariosGruposRol('P')->all())
            ],
            [
                'type'=>'raw',
                'label'=>'Alumnos',
                'value'=>count($model->getUsuariosGruposRol('A')->all())
            ]
        ]
    ]); ?>

    <?=
    ob_start();
            echo GridView::widget([
                    'dataProvider' => new ActiveDataProvider(['query'=>$model->getUsuariosGrupos(), 'pagination' => ['pageSize' => 10, ] ]),
                    'columns' => [
                        ['attribute'=>'imagen','format'=>'raw','value'=>function($data){
                            return '<img height=70px src="'.$data->usuarios->getPicture().'">';
                        }],
                        'usuarios.nombre',
                    ],
                    'rowOptions' => function ($model, $key, $index, $grid) {
                        return [
                            'style' => "cursor: pointer",
                            'onclick' => 'location.href="'.Yii::$app->urlManager->createUrl(['usuarios/view','id'=> $model->usuarios->id]).'"'
                        ];
                    }
            ]);
    $usu = ob_get_clean(); ?>

    <?=
    ob_start();
        echo GridView::widget([
            'dataProvider' =>  new ActiveDataProvider(['query'=>$model->getClases(), 'pagination' => ['pageSize' => 10, ] ]),
            'columns' => [
                'fecha:ntext:Fecha',
                'hora1:ntext:Hora Inicio',
                'hora2:ntext:Hora Fin',
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete} {copy}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            $url = Url::toRoute(['clases/update', 'id'=>$model->id]);
                            return Html::a('<button class="btn btn-info">Modificar</button>', $url);
                        },
                        'delete' => function ($url, $model) {
                            $url = Url::toRoute(['clases/delete', 'id'=>$model->id]);
                            return Html::a('<button class="btn btn-danger">Borrar</button>', $url,
                                [
                                    'data' => [
                                        'confirm' => '¿Seguro que quieres eliminar la clase?',
                                        'method' => 'post'
                                    ],
                                ]
                            );
                        },
                        //Error que no muestra el crear clases
                        'copy' => function ($url, $model) {
                            $url = Url::toRoute(['crearclases', 'id'=>$model->id]);
                            return Html::a('<button class="btn btn-primary">Crear Clases</button>',$url);
                        },
                    ],
                ],
            ]
        ]);
    $clases = ob_get_clean(); ?>

    <?=
    Tabs::widget([
        'items' => [
            [
                'label' => 'Lista de alumos',
                'content' => $usu,
            ],
            [
                'label' => 'Clases del grupo',
                'content' => $clases,
            ]
        ]
    ]); ?>

</div>
