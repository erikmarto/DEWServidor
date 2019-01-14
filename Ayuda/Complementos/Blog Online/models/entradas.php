<?php

class entradas extends model {
	static $tablename='entradas';
    static $attributes;
    
    public function getcomentarios(){
		return comentarios::findAll('entradas_id='.$this->id);
	}
	public function getusuario(){
		return usuarios::findByPk($this->usuarios_id);
	}

	
	
}
