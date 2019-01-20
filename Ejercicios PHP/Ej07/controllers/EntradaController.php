<?php

class EntradaController extends controller {

    function actionIndex() {
		$categorias=categorias::findAll();
        $this->render('entradas/añadir', array('categorias'=>$categorias));
    }

    function actionCreate(){
        $entrada = new entradas;
		if(isset($_POST['entradas'])) {
			$entrada->setvalues($_POST['entradas']);
			if($entrada->save())
				$this->redirect('site/index');
        }
		$this->render('entradas/añadir');
	}

}

?>