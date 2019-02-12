<?php

use yii\helpers\Html;
use yii\helpers\Url;

//<?php echo $model->getDescri();

//<?php echo $model->fecha_ult
?>

<article class="" >
    <a class="listaEnlaces" href="?r=chats%2Fmensajes&id=<?php echo $model->grupos_id?>">
        <div class="ListaChatsContainer col-md-9">
            <div class="listaChatsTipo">
                <?php 
                    switch($model->grupos_id){
                        /* case 'null':
                            echo "<p>General</p>";
                            break; */
                        case '1':
                            echo "<p>Tango iniciacion</p>";
                            break;
                        case '2':
                            echo "<p>Tango iniciacion 2</p>";
                            break;
                        case '3':
                            echo "<p>Tango pro</p>";
                            break;
                        case '4':
                            echo "<p>Salsa en linea</p>";
                            break;
                        case '5':
                            echo "<p>Salsa cubana</p>";
                            break;
                        case '6':
                            echo "<p>Pasodobles y swing</p>";
                            break;
                    }
                ?>
            </div>
            <!-- borrar chat -->
            <div class="listaChatsBorrar pull-right">
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Estás seguro?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </a>
</article>