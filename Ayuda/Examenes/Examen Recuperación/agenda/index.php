<?php
require "agenda.class.php";

$agenda=new agenda();

if(!$agenda->anadircita(2,"18:00","PEPE")) //Añade cita el día 2  a las 18 horas para el cliente PEPE
		echo "Error al añadir cita";

if(!$agenda->anadircita(2,"19:00","JUANA")) //Añade cita el día 2 a las 19 horas para JUANA
	echo "Error al añadir cita";

if(!$agenda->anadircita(2,"19:00","LUIS"))
	echo "Error al añadir cita";   // Debe salir este error porque ese día/hora está reservado

$agenda->borrarcita(2,"18:00"); //Borra la cita del día 2 a las 18 horas


$citas=$agenda->getcitasdia(2);  // Devuelve las citas del día 2
foreach($citas as $cita)
	echo "<li>".$cita->hora.' '.$cita->paciente;


$citas=$agenda->getcitaspaciente("PEPE");  // Devuelve las citas del paciente PEPE
foreach($citas as $cita)
	echo "<li>".$cita->dia.' '.$cita->hora;


