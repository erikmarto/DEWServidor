<?php

    class siteController extends controller {

        public function actionLogin() {

            if (isset($_POST['usuarios'])) {
                $usuario = app::instance()->login($_POST['usuarios']['usuario'], $_POST['usuarios']['password']);
                if (!$usuario->errors) { // Login correcto
                    $this->redirect('/');
                }
            } else{
                $usuario = new usuarios;
            }
                

            $this->render('site/login', array('usuario' => $usuario));
        }

        public function actionLogout() {
            app::instance()->logout();
            $this->redirect('/');
        }

        public function actionAyuda() {

            $this->render('site/ayuda');
        }

    }
    