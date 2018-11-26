<?php
require 'mastermind.class.php';

//Inicializamos datos
session_start();
/* session_destroy();*/


if(isset($_SESSION['masterM'])){
    $masterM = new masterMind();
    $masterM->generarNum();
    $_SESSION['masterM'] = $masterM;

    var_dump($masterM);
	} else {
        /* $masterM = $_SESSION['masterM']; */
}


if(isset($_POST['comprobar'])){
    var_dump($_POST['numero']);
    $masterM->comprobar($_POST['comprobar']);
}

require 'vistas/vista.php';

?>
