<?php
/** Formulario de registro de usuarios, con validación de datos en el servidor
 *
 */
require 'vistas/cabecera.php';
require 'mastermind.class.php';

//Inicializamos datos
$masterM = new MasterMind;


if (isset($_POST['comprobar'])) {
    $masterM->asignar($_POST['usuario']);

    if($u->password!=$_POST['password2'])
        $u->seterror('password','No coinciden las contraseñas');
    
    if(!isset($_POST['condiciones']))
        $ercondiciones='Debes aceptar las condiciones';
    elseif($u->validar()) {
        //$u->save(); Se guardaría en Base de datos
        require 'vistas/correcto.php';
        die();
    }
} 

$masterM->prueba();

require 'vistas/pie.php';