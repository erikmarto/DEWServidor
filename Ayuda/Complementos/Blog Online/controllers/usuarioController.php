<?php

class usuarioController extends controller {

    public function actionView(){
		$usuario=app::instance()->getuser();

		$this->render('usuario/perfil/view',array('usuario'=>$usuario));
	}
	public function imagenPerfil(){
		
	}

}

?>