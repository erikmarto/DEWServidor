<?php


use yii\helpers\Html;

use yii\widgets\ListView;
use yii\widgets\ActiveForm;



echo ListView::widget([
    'dataProvider' => $mensajes,
    'itemView' => '_mensajes',
]);

?>
 <form action=''
<?= Html::textArea('=>',""); ?>
