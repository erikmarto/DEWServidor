<?php

use app\models\Mensajes;
use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;

echo ListView::widget([
    'dataProvider' => $mensajes,
    'itemView' => '_mensaje',
]);

$user = Yii::$app->user->identity;

$model = new Mensajes();

    echo $this->render('_mensajeForm', array(
       'model' => $model,
       'chatId' => $chatId,
       'userId' => $user->id
    ));

?>