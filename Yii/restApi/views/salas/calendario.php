<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\JsExpression;
use yii\db\QueryBuilder;
use yii\db\Query;
use app\models\SalasSearch;
use app\controllers\SalasController;
use \edofre\fullcalendarscheduler\FullcalendarScheduler;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planificación Calendario';
$this->params['breadcrumbs'][] = ['label' => 'Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="salas-index">

	<h1>
		<?= Html::encode($this->title) ?>
	</h1>


	<style type="text/css">
	.fc-resource-area{
		width: 220px
	}

	.fc-toolbar .fc-center {
		display: flex;
		padding-left: 10px;
		align-items: center;
		height: 30px;
	}

	.fc-toolbar .fc-center > h2{
		font-size: 14px
	}
</style>

    <!-- https://www.yiiframework.com/extension/fullcalenderscheduler -->
    <!-- http://yii2fullcalendar.beeye.org/ -->
    <!-- https://es.stackoverflow.com/questions/110388/enviar-variables-por-ajax-a-un-archivo-php -->
	<!-- https://www.drupal.org/project/fullcalendar/issues/1326774 -->
    <?php 
    /* Coger el día de hoy */
        $now=date("Y-m-d");
		/*
		(eventDrop: evento movido)
			fecha_horaIni=>recoge el dia y la hora de inicio del evento
			fecha_horaFin=>recoge el dia y la hora de final del evento
			$.ajax=>función para hacer una petición en el servidor y devolver los datos
			url:=>url a la función(actionActualizar_clase() en salas controller)
			data:{//datos pasados a la función}
		*/

    ?>
    
    <?= FullcalendarScheduler::widget([

        
    'header'        => [
        'left'   => 'today prev,next',
        'center' => 'title',
        'right'  => 'agendaWeek,month',
    ],
    'clientOptions' => [
        'now'               => $now,/*dia de hoy*/
        'editable'          => true, // enable draggable events
		'aspectRatio'       => 1.8,
		'slotDuration'		=>'00:15',
        'scrollTime'        => '00:00', // undo default 6am scrollTime
		'defaultView'       => 'month',
		

        'eventDrop' => new \yii\web\JsExpression("
				function(event) {
					var fecha_horaIni=event.start.format().split('T');
					var fecha_horaFin=event.end.format().split('T');

					$.ajax({
						method:'GET',
						url:'./?r=clases/actualizar_clase',
						data:{
							'id':event.id,
							salas_id:parseInt(event.resourceId),
							fecha:fecha_horaIni[0],
							hora1:fecha_horaIni[1],
							hora2:fecha_horaFin[1]
						}
					}).done(function( msg ) {
						console.info('Clase actualizada');
					});

			    }
		"),
		
		'dayClick'          => new \yii\web\JsExpression("
			function(date, jsEvent, view, resource) {
				
					view.calendar.gotoDate(date);
					view.calendar.changeView('timelineDay');
			}
		"),

		'eventClick'          => new \yii\web\JsExpression("
			function(event,date, jsEvent, view, resource) {
				var id=event.id;
				console.log(
					id
				);
				window.location.replace('".Url::to(['/clases/update'])."&id='+id);	
				
			}
		"),

		'resourceLabelText' => 'Salas',
        'resourceAreaWidth' => '18%',
        'resourceColumns'   => [
            [
                'labelText' => 'Sala',
                'field'     => 'title',
            ],
            [
				'labelText' => 'Capacidad',
				'resourceAreaWidth' => '5%',
                'field'     => 'occupancy',
            ],
        ],
        'resources'         => $salas,
        'events'            => $clases,

    ],
]);

/*
$.ajax({
	method:'GET',
	url:'./?r=clases/update_fff&id=id',
	async: false,
	data:{
		'id':id,
	},
});
*/
?>


</div>