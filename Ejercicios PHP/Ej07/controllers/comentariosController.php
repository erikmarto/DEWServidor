<?php

class comentariosController extends controller {

    function actionCreate(){
        $comentario = new comentarios;
		if(isset($_POST['comentario'])) {
			$comentario->setvalues($_POST['comentario']);
			if($comentario->save())
				$this->redirect('site/index');
        }
		$this->render('site/index');
    }
    
}

?>