<?php
/** Juego del ahorcado, utilizando clases
 * 
 */
require 'ahorcado.class.php';
session_start();


if(isset($_GET['start'])){ //EMPEZAMOS JUEGO
    $ahorcado=new ahorcado;
    $ahorcado->empezarjuego();
    $_SESSION['ahorcado']=$ahorcado;
}
if(!isset($_SESSION['ahorcado'])){ //No hay juego activo
    $mensaje="Pulsa el botón para comenzar";
    require "vistas/vermensaje.php";
    die;
} else
    $ahorcado=$_SESSION['ahorcado'];


$verpeli=false;  //Muestra el titulo en el tablero (para debugger)

if(isset($_GET['letra'])){ //JUgamos la letra

    $resultado=$ahorcado->jugar($_GET['letra']);
    switch($resultado){
        case ahorcado::ER_INCORRECTA:
            $mensaje="Letra incorrecta";
            require "vistas/tablero.php";
            break;
        case ahorcado::ER_YAJUGADA:
            $mensaje="Letra ya jugada";
            require "vistas/tablero.php";
            break;
        case ahorcado::JUG_OK:
            $mensaje="Muy bien!";
            require "vistas/tablero.php";
            break;
        case ahorcado::JUG_NOESTA:
            $mensaje="Mala suerte!";
            require "vistas/tablero.php";
            break;
        case ahorcado::JUG_PELIDIVINADA;
            $mensaje="ACERTASTE!!";
            require "vistas/vermensaje.php";
            break;
        case ahorcado::ER_MAXINTENTOS;
            $mensaje="Demasiados intentos. La peli era: ".$ahorcado->getpeliculastr();
            require "vistas/vermensaje.php";
            break;
        
    }
} 
else
    require "vistas/tablero.php";




