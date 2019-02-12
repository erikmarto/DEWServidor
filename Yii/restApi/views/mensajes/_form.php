<?php

use app\models\Chats;
use yii\helpers\Html;
use app\models\Mensajes;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use sadovojav\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Mensajes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensajes-form">

    <?php $form = ActiveForm::begin(['action'=>['mensajes/create']]); ?>

 <?= $form->field($model, 'texto')->textarea(['rows' => 6, 'cols' => 50]); ?>
    
<?= $form->field($model, 'chats_id')->hiddenInput() ?>

<?= $form->field($model, 'usuarios_id')->textInput() ?>
<?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>
