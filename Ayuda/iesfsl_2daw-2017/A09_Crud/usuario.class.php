<?php

class Usuario {
    public $_isnew; //Si es true, el objeto es nuevo
    public $errores=[]; //array de atributo=>error
    //
    // Estados de usuario
    static $estados=['P'=>'Pend. confirmar','A'=>'Activo','B'=>'Bloqueado'];

    public $id;
    public $nombre;
    public $email;
    public $estado;
    
    public function __construct(){
        $this->_isnew=true;
    }
    // Valida atributos. Devuelve true si no hay errores
    public function validate(){
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL))
                $this->errores['email']='Email incorrecto';
        if(!$this->nombre)
                $this->errores['nombre']='Nombre requerido';
        return !$this->errores;
    }
    
    // Devuelve error de validación de un atributo
    public function geterror($atributo){
        if(isset($this->errores[$atributo]))
            return $this->errores[$atributo];
        else
            return '';
    }
    
    public function getestadotext(){
        return self::$estados[$this->estado];
    }
}

