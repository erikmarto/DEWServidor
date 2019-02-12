<?php

use app\models\Chats;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->params['breadcrumbs'][] = 'Reenviar';
?>

<div class="mensaje-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'texto')->textarea() ?>

    <?php echo $form->field($model, 'chats_id')->widget(Select2::classname(), [
        'data' => ['Grupos' => ArrayHelper::map(Chats::find()->where('id!='.$model->chats_id)->all(), 'id', 'nombre')],
        'options' => ['placeholder' => 'Slecciona un chat', 'multiple' => true],
        /* 'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10
        ], */
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Reenviar', ['class' => 'btb btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>