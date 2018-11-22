<?php

class MasterMind {
    //variable principal
    public $rndArray = [];

    //segundas variables
    public $cont;
    public $contIntentos = 0;
    public $contHeridos = 0;
    public $contMuertos = 0;

    public $numero;

    //errores
    protected $errores = [];

    public function inicio() {
        $primerRandom = mt_rand(1,6);
        array_push($this->rndArray, $primerRandom);

        for ($i = 0; $i < 3; $i++) {
            $numRandom = mt_rand(1,6);
            /* var_dump($i); */
            if (in_array($numRandom, $this->rndArray)) {
                $i--;
            }else {
                array_push($this->rndArray, $numRandom);
            }
        }
        return $this->rndArray;  
    }
    
    public function comprobar($numero, $rndArray = [], $i) {
        if ($numero != $rndArray[$i]) {
            var_dump("Numero incorrecto!");
        } else {
            var_dump("Numero correcto!");
        } 
    }
}

?>