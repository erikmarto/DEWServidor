<?php

class comentarios extends model {
	static $tablename='comentarios';
    static $attributes;
    
    public function getentrada(){
		return entrada::findByPk($this->entrada_id);
	}
	public function getusuario(){
		return usuarios::findByPk($this->usuarios_id);
	}
}
