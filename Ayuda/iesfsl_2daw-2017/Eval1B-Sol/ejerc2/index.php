<?php
// TEST DE LA CLASE AGENDA
require 'Agenda.class.php';

echo '<h2>Test de la clase Agenda</h2>';
//Define el horario de las citas
Agenda::sethorario(['11:00','11:45','12:30','13:15']);

try {
	$agenda=new Agenda(2017,14); //Intenta crear Agenda del mes 14 de 2017
	echo "<li>ERROR en el control de mes de la agenda";
} catch (Exception $e) {
	echo "<li>Funciona el control del mes de la agenda";
}

$agenda=new Agenda(2017,11); //Agenda del mes de noviembre de 2017

//Añade una cita el día 12 a las 11. Devuelve la Cita
$cita=$agenda->anadecita(12,'11:00','Manuela García');

if(is_object($cita))
	echo "<li>Cita creada: ".$cita->paciente;
else {
	echo "<li>ERROR al crear cita";
}
$cita=$agenda->anadecita(19,'11:00','Manuela García');

//Si se fija horario de 11:00 a 14:00, esto debe dar error
$cita2=$agenda->anadecita(12,'08:00','Pepe Pérez');
if($cita2==-1)
	echo "<li>Control de horario de citas correcto!";
else {
	echo "<li>ERROR en control de horario de citas";
}
$cita3=$agenda->anadecita(16,'08:00','Pepe Pérez');

//Devuelve
$cita3=$agenda->anadecita(12,'11:00','Andrés');
if($cita3==-2)
   echo "<li>Control de citas repetidas correcto";
else {
	echo "<li>ERROR en control de citas repetidas";
}

$paciente='Manuela García';
echo "<h3>Citas de $paciente:</h3>";
foreach($agenda->getcitaspaciente($paciente) as $cita){
	echo "<li>".$cita->fechahora();
}
 ?>
