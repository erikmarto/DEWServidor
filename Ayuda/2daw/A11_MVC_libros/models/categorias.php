<?php

class categorias extends model {
	static $tablename='categorias';
	static $attributes;
	static $labels=array('parent_id'=>'Cat. padre');
	
	public function __tostring(){
		return $this->nombre;
	}

	public function validate(){
		if($this->parent_id==$this->id)
			$this->addError('parent_id','Nadie puede ser padre de sí mismo!');

		return parent::validate();
	}

	public function getcatpadre(){
		if($this->parent_id)
			return categorias::findByPk($this->parent_id);
		else
			return null;
	}

}
