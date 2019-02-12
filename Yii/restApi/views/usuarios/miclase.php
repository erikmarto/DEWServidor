<?php

use yii\helpers\Html;

?>
<h3>
    <?=$clase->grupo->nombre?> /
    <?=$clase->fecha?> /
    <?=$clase->hora1?>
</h3>
<h4>
    Asistentes
</h4>
<p>



<?php



if ($asist->confirmado == 'N') {
    $label = "Confirmar";
  $class = "btn btn-primary btn-success";
    $q = "S";
}
else if ($asist->confirmado == "S") {
    $label = "Cancelar";
    $class = "btn btn-primary btn-danger";
    $q = "N";
}
echo Html::a($label, ['/usuarios/confirmar', 'id' => $asist->id, 'q' => $q], ['class' => $class]);

echo Html::a('Quizas', ['/usuarios/confirmar', 'id'=> $asist->id, 'q'=>'Q'], ['class' => 'btn btn-warning']);

?>
</p>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        <?php
foreach ($asistentes as $asistente) {
    if ($asistente->confirmado == 'N') {?>
        <tr class="danger">
            <td> <?=$asistente->usuario->nombre?>
        </tr>
        <?php } else if ($asistente->confirmado == 'S') {?>
        <tr class="success">
            <td> <?=$asistente->usuario->nombre?>
        </tr>
        <?php } else {?>
        <tr class="warning">
            <td> <?=$asistente->usuario->nombre?>
        </tr>
        <?php }
}
?>
    </tbody>
</table>
</div>
