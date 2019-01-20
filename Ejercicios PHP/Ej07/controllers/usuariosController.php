<?php

class usuariosController extends controller {

	public $title='usuarios';

	public function actionIndex(){
		$this->render('usuarios/index');
	}

	public function actionViewAdmin(){
		$entradas = entradas::findAll('aceptado = 0');
		$this->render('usuarios/adminControl', array('entradas'=>$entradas));
	}

	public function actionActivar($id){
		$entrada = entradas::findbyPk($id);
		$entrada->aceptado = 1;
		$entrada->save();

		$entradas = entradas_cat_usu::findAll('aceptado = 1','id DESC LIMIT 5');
		$this->render('site/index', array('entradas'=>$entradas));
	}

	function actionLogin() {

        if (isset($_POST['usuarios'])) {
            $usuario = app::instance()->login($_POST['usuarios']['usuario'], $_POST['usuarios']['password']);
            if (!isset($usuario->errors)) { // Login correcto
                $this->redirect('/');
            }
        } else
            $usuario = new usuarios;

        $this->render('usuarios/login', array('usuario' => $usuario));
    }

    public function actionSignup() {

        $usuario = new usuarios;
        //post -> ['usuario'], ['password'], ['password2']
        if (isset($_POST['usuario'])) {
            $usuario->setvalues($_POST['usuario']);
            $usuario->validatePassword($_POST['password2']);
            if ($usuario->save()) {
                $this->redirect('usuarios/success');
            }
            
        }

        $this->render('usuarios/signup', ['usuario' => $usuario]);
    }

    public function actionSuccess() {
        $this->render('usuarios/success');
    }

    function actionLogout() {
        app::instance()->logout();
        $this->redirect('/');
    }
}