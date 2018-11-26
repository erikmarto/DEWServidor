<?php

class MasterMind {
    //variable principal
    public $numRnd = [];

    //segundas variables
    public $cont;
    public $maxIntentos = 0;
    

    public $numero;

    //errores
    protected $errores = [];

    public function __construct(){
        $this->generarNum();
    }
    /* public function inicio() {
        $primerRandom = mt_rand(1,6);
        array_push($this->rndArray, $primerRandom);

        for ($i = 0; $i < 4; $i++) {
            $numRandom = mt_rand(1,6);
            if (in_array($numRandom, $this->rndArray)) {
                $i--;
            }else {
                array_push($this->rndArray, $numRandom);
            }
        }
        var_dump($numRandom);
        return $this->rndArray;
    } */

    public function generarNum(){
        $this->numRnd = range(0,9);
        shuffle($this->numRnd);
        $this->numRnd = array_slice($this->numRnd,0,4);
    }

    public function comprobar($numero, $rndArray = [], $i) {
        $heridos = 0;
        $muertos = 0;

        if ($numero != $rndArray[$i]) {
            var_dump("Numero incorrecto!");
        } else {
            var_dump("Numero correcto!");
        }    
    }
}

?>