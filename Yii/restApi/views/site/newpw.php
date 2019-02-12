<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'Reestablecer contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-awf">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php echo $user->usuario?>
    
    <?php $form = ActiveForm::begin([
        'id' => 'reset-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
        <?= $form->field($model, 'password2')->passwordInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password3')->passwordInput(['autofocus' => true]) ?>
        
        
        

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
