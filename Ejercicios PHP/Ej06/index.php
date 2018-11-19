<?php
/** Formulario de registro de usuarios, con validación de datos en el servidor
 *
 */
require 'vistas/cabecera.php';
require 'mastermind.class.php';

//Inicializamos datos
$masterM = new MasterMind;

$masterM->prueba();

require 'vistas/pie.php';