<?php

class adminController extends controller {

    public $title = "Admin"; 

    function actionIndex() {

        $this->render('admin/index');
    }

    function actionApproveComentarios() {

        if (isset($_POST['comentarios'])) {
            foreach($_POST['comentarios'] as $comentario) {
                $e = comentarios::findByPk($comentario);
                $e->aceptado = 1;
                $e->save();
            }
        }
        
        $comentarios = comentarios_cat_usuarios::findAll("aceptado = 0", "fecha_hora DESC");

        $this->render('admin/comentarios', ['comentarios' => $comentarios]);
    }

    function actionApproveUsuarios() {

        if (isset($_POST['usuarios'])) {
            foreach($_POST['usuarios'] as $usuario) {
                $u = usuarios::findByPk($usuario);
                $u->estado = 'A';
                $u->save();
            }
        }

        $usuarios = usuarios::findAll("estado LIKE 'P'");

        $this->render('admin/usuarios', ['usuarios' => $usuarios]);
    }

    function actionApproveEntradas() {

        if (isset($_POST['entradas'])) {
            foreach($_POST['entradas'] as $entrada) {
                $e = entradas::findByPk($entrada);
                $e->aceptado = 1;
                $e->save();
            }
        }

        $entradas = entradas_cat_usuario::findAll("aceptado = 0", "fecha_hora DESC");

        $this->render('admin/entradas', ['entradas' => $entradas]);
    }
    
}


?>