<?php

class userController extends controller {

    public $title = "User";



    public function actionInbox() {
        $usuario = app::instance()->getuser();
        $this->render('user/inbox', ['usuario' => $usuario]);
    }

    public function actionUserinfo($id = '') {
        //lleva al blog del usuario
        $usuario = $id != ''?
                    usuarios::findByPk($id) :
                    app::instance()->getuser();
        $this->render('user/userinfo', ['usuario' => $usuario]);
    }


    public function actionLogin() {
        if(isset($_POST['login'])) {
            $usuario = app::instance()->login($_POST['login']['username'], $_POST['login']['password']);
            //var_dump($usuario);
            if (!isset($usuario->errors)) {
                $this->redirect('blog/userBlog');
            }
        } else {
            $usuario = new usuarios(); //doesn't get uname
        }
        $this->render('user/login', ['usuario' => $usuario]);
    }

    public function actionLogout() {
        app::instance()->logout();
        $this->redirect('/');
    }

    public function actionSignup() {

        $usuario = new usuarios;
        //post -> ['usuario'], ['password'], ['password2']
        if (isset($_POST['usuario'])) {
            $usuario->setvalues($_POST['usuario']);
            $usuario->validatePassword($_POST['password2']);
            if ($usuario->save()) {
                $this->redirect('user/success');
            }
            
        }

        $this->render('user/signup', ['usuario' => $usuario]);
    }

    public function actionSuccess() {
        $this->render('user/successfulSignup');
    }


}
