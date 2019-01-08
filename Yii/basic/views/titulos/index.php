<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TitulosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Titulos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <!--
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Titulos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'list-view'],
        'itemOptions' => ['class' => 'item titulo-container'],
        'layout' => "{summary}\n{pager}\n<div class='titulos-container'>{items}</div>\n{pager}",
        'itemView' => '_view',
    ]) ?>
    <?php Pjax::end(); ?>
</div>
