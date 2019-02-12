<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* 1<?= $model->id?> */
 /* 2<?php echo $model->usuario->nombre?> */
 /* 3<?php echo $model->texto ?> */
 /* 4<?php echo $model->fecha?> */
?>

<article class="item" data-key="<?= $model->id?>">
    <div class="listaMensajesEmisor"><?php echo $model->usuario->nombre?></div>
    <div class="listaMensajeTexto">
    <?php echo $model->texto ?>
    </div>

    <div class="listaMensajesHora">
    <?php echo $model->fecha?>
    </div>
</article>