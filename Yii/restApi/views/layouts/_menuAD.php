<?php 

use yii\bootstrap\Html;

return [
    ['label' => 'Clases', 'url' => ['/clases/index']],
    ['label' => 'Usuarios', 'url' => ['/usuarios/index']],
    ['label' => 'Grupos', 'url' => ['/grupos/index']],
    ['label' => 'Apuntes', 'url' => ['/apuntes/index']],
    ['label' => 'Salas', 'url' => ['/salas/index']],
    ['label' => 'Calendario', 'url' => ['/salas/calendario']],
    ['label' => 'Mensajes', 'url' => ['/mensajes/index']],

    '<li>'
    . Html::beginForm(['/site/logout'], 'post')
    . Html::submitButton(
        'Logout (' . Yii::$app->user->identity->usuario . ')',
        ['class' => 'btn btn-link logout']
    )
    . Html::endForm()
    . '</li>'

];