<?php
 $heridos=0;
 $muertos=0;
class mastermind
{
    public $numeroWinner = [];
    public $numeroJugador = [];
    
    public function __construct()
    {
        $this->generarNumero();
        
    }
    public function generarNumero()
    {
        $this->numeroWinner=range(0,9);
        shuffle($this->numeroWinner);
        $this->numeroWinner=array_slice($this->numeroWinner,0,4);
    }

    public function comprobarNumero($numeroJugador)
    {
        $numeroSeparado= str_split($numeroJugador);
        $muertos=0;
        $heridos=0;
        
        for ($i=0;$i<strlen($numeroJugador);$i++){
            if($numeroSeparado[$i]==$this->numeroWinner[$i]){
                $muertos++;
                $heridos++;
               
            }
        }

        $this->numeroJugador[]=["tirada"=>$numeroJugador,"muertos"=>$muertos,"heridos"=>$heridos];


    }
}
