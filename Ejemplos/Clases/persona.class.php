<?php
class persona {
    public $nombre;
    public $apellidos;    
    private $edad;
    private $sexo;

    const MAXEDAD=120;
    static $generos=['H'=>'Hombre','M'=>'Mujer'];

    public function __contruct($nombre = "",$apellidos = "") {
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
    }

    public function __set($prop,$valor) {
        switch ($prop) {
            case 'edad':
                if ($valor<0 or $valor>self::MAXEDAD) {
                    die("Edad incorrecta");
                }else{
                    $this->edad = $valor;
                }
            break;
            case 'sexo':
                if (!isset(self::$genero[$valor])) {
                    die("Sexo incorrecto");
                }else{
                    $this->sexo = $valor;
                }
            break;
            default:       
            die("Error, No se puede asignar $prop!!");
        }
    }

    public function __get($prop) {
        if($prop == 'edad') { //if(isset($this->$prop))
            return $this->edad;
        }else{
            die("No existe la propiedad $prop!!");
        }
        if($prop == 'sexo'){
            return $this->$sexoTe;
        }else{
            die("Error, No se puede asignar $prop!!");
        }
    }
    public function nombrecompleto() {
        return $this->nombre.' '.$this->apellidos;
    }
}
?>