<?php

class categoriasController extends controller {

	public $title='Categorías';

	public function actionIndex(){
		$categorias=categorias::findAll('','nombre');
		if(app::instance()->checkrole('AD'))
			$vista='categorias/indexAD';
		else
			$vista='categorias/index';
		$this->render($vista,array('categorias'=>$categorias));
	}


	public function actionView($id){
		$categoria=categorias::findByPk($id);
		echo $categoria->categoria;

	}

}
