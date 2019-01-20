<?php

class entradas extends model {
	static $tablename='entradas';
	static $attributes;

	public function getEntradas(){
		return entradas::findAll('entrada_id='.$this->id);
	}
	public function getnumEntradas(){
		return count(entradas::findAll('entradas_id='.$this->id));
	}
}
