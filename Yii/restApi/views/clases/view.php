<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clases */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->grupo->nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="clases-view">
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Anular', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que deseas anular la clase?',
                'method' => 'post',
            ],
        ]) ?>  
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fecha',
            'hora1',
            'hora2',
            ['attribute'=>'salas.nombre','label'=>'Salas'],
            ['attribute'=>'grupo.nombre','label'=>'Grupos'],
        ],
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider(['query'=>$model->getAsistentes()->orderBy('id')]),
        'columns' => [
            //'id',
            'usuario.nombre',
            'confirmado',
            [ 
                'label' => 'Cambiar confirmación',
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a('Si', ['/asistentes/confirmacion', 'idClase' =>$data->clases_id, 'id' =>$data->id, 'opcionConfirmacion'=>'S'], ['class' => 'btn btn-primary']).
                        '&emsp;'.Html::a('No', ['/asistentes/confirmacion', 'idClase' =>$data->clases_id, 'id' =>$data->id, 'opcionConfirmacion'=>'N'], ['class' => 'btn btn-primary']);
                }
            ],
        ],
        
    ]) 
    
    ?>

</div>

