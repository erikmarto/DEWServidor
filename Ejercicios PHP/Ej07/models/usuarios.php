<?php

class usuarios extends model {
    static $tablename="usuarios";
    static $attributes;

    function isAdmin() {
        return $this->role;
    }
    
    function validatePassword($pw2) {
        if (!$pw2) {
            $this->addError('password', 'Debe introducir ambas contraseñas');
        } elseif (strlen($this->password) < 6 || strlen($this->password) > 31) {
            $this->addError('password', 'La contraseña debe tener entre 6 y 31 caracteres.');
        } elseif ($this->password != $pw2) {
            $usuario->addError('password', 'Ambas contraseñas deben coincidir.');
        }
    }


    public function validate() {
        //validacion nombre
        if (!$this->nombre) {
            $this->addError('nombre', 'Introduzca su nombre.');
        }

        //validacion usuario
        if(!$this->usuario) {
            $this->addError('usuario', 'Introduzca un nombre de usuario.');
        } elseif(count(self::findAll("usuario = $this->usuario"))) {
            $this->addError('usuario', 'Un usuario con este nombre de usuario ya existe.');
        }

        //valdiacion email
        if (!$this->email) {
            $this->addError('email', 'Introduzca un email');
        }
        elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Debe introducir un email válido.');
        }

        return parent::validate();
    }
    
    public function save() {
        if (strlen($this->password) < 32) {
            $this->password = md5($this->password);
        }
        return parent::save();
    }
}
?>