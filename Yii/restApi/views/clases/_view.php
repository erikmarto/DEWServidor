<?php
//var_dump($model);
use yii\helpers\Html;

?>
<br>

<p>Clase : <?= Html::a($model->id, ['clases/view', 'id'=>$model->id]);?></p>
<p>Fecha : <?= $model->fecha;?></p>
<p>Hora Inicio : <?= $model->hora1;?></p>
<p>Hora Fin : <?= $model->hora2;?></p>
<p>Sala : <?= $model->salas->nombre;?></p>
<p>Grupo : <?= $model->grupos->nombre;?></p>

<br>
   
    
