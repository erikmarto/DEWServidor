<?php 

use yii\bootstrap\Html;

return [
    ['label' => 'Mis Panel', 'url' => ['/usuarios/panel']],
    ['label' => 'Mis Apuntes', 'url' => ['/usuarios/apuntes']],
    ['label' => 'Mis Chats', 'url' => ['/usuarios/chats']],


    '<li>'
    . Html::beginForm(['/site/logout'], 'post')
    . Html::submitButton(
        'Logout (' . Yii::$app->user->identity->usuario . ')',
        ['class' => 'btn btn-link logout']
    )
    . Html::endForm()
    . '</li>'

];