<?php

//require 'persona.class.php';

//Autocarga de funcion
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.class.php';
});

//Herencias
class alumno extends persona {
    public $curso;

    public function nombrecompleto() {
        $ret = parent::nombrecompleto();
        return strtoupper($ret);
    }
}

//$usuario1 = new persona();

//$usuario = new persona("pepe","garcia");

/* $usuario->nombre="pepe";
$usuario->apellidos="garcia"; */

$usu2 = $usuario;//por referencia no duplicas
$usu2->nombre = 'juana';

$usuario->sexo = "M";
//echo "El sexo es:".$usuario->sexoText;

echo $usuario->nombrecompleto();

//$usuario->edad = 110;
echo $usuario->edad;//Error

$alu = new alumno("juan","rodriguez");
echo $alu->nombrecompleto();
$alu->curso='2Daw';

?>