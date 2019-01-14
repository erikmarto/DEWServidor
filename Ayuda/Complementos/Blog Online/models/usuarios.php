<?php

class usuarios extends model {
	static $tablename='usuarios';
	static $attributes;

	public function comentarios(){
		return comentarios::findAll('usuarios_id='.$this->id);
	}
}