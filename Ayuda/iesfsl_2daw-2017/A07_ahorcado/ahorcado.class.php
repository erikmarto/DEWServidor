<?php

class ahorcado {
    const MAXFALLOS=8;
    
    const ER_INCORRECTA=-1;
    const ER_YAJUGADA=-2;
    const ER_MAXINTENTOS=-3;
    const JUG_PELIDIVINADA=0;
    const JUG_OK=1;
    const JUG_NOESTA=2;
    
    /** Pelicula a adivinar
     *
     * @var type array de letras
     */
    private $pelicula;
    /** Letras que ya se han jugado
     *
     * @var type array
     */
    private $letrasjugadas;
    /** Fallos cometidos
     *
     * @var type int
     */
    private $fallos;
    
    /** Comienza el juego
     * 
     */
    public function empezarjuego(){
       $this->fallos=0;
       $this->letrasjugadas=array();
       $this->pelicula=$this->elegirpelicula();
    }
    
    /** elige la pelicula a adivinar y la devuelve como un array de letras
     * 
     */
    private function elegirpelicula(){
        $pelis=file('pelis');
        $x= rand(0,count($pelis)-1);
        //trim para quitar el salto de linea, y la convertimos a mayusculas
        return str_split(strtoupper(trim($pelis[$x])));
    }
    
    public function getpelicula(){
        return $this->pelicula;
    }
    public function getpeliculastr(){
        return implode('',$this->pelicula);
    }
    public function getletrasjugadas(){
        return $this->letrasjugadas;
    }
    public function getfallos(){
        return $this->fallos;
    }
    
    /** Devuelve true si se ha jugado la letra que se le pasa
     * 
     * @param type $letra
     * @return type boolean
     */
    public function letrajugada($letra){
        return in_array($letra,$this->letrasjugadas);
    }
    
    public function jugar($letra){
        $letra=  strtoupper($letra);
        if((strlen($letra)!=1) || ($letra<'A') || ($letra>'Z'))
            return self::ER_INCORRECTA;
        elseif($this->letrajugada($letra))
            return self::ER_YAJUGADA;
        else { // Letra correcta para jugar
            $this->letrasjugadas[]=$letra;
            if(in_array($letra,$this->pelicula)) {//acertada
                // Si ya estan todas las letras adivinadas, excluyendo blancos, final
                if(array_diff($this->pelicula,$this->letrasjugadas,array(' ')))
                    return self::JUG_OK;
                else
                    return self::JUG_PELIDIVINADA; 
            }else {
                $this->fallos++;
                if($this->fallos==self::MAXFALLOS)
                    return self::ER_MAXINTENTOS;
                else
                    return self::JUG_NOESTA;
            }
        }
    }
}
