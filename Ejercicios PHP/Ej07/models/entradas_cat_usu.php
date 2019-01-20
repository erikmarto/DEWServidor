<?php

class entradas_cat_usu extends model {
	static $tablename='entradas_cat_usu';
	static $attributes;

    public function __tostring(){
		return $this->entrada;
	}

}
