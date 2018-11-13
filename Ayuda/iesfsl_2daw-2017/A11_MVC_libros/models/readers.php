<?php

class readers extends model {
	static $tablename='readers';
	static $attributes;

	public function __tostring(){
		return $this->descri;
	}

}
