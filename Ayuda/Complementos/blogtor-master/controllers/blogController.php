<?php

class blogController extends controller {

    public $title = "Blogs"; 

    function actionIndex($step = 0) {

        //enseñar listado de nuevos blogs
        if (app::instance()->isLogged()) {
            //TODO search tailored for user
            $usuario = app::instance()->getuser();
            $entradas = entradas_cat_usuario::findAll("usuarios_id != $usuario->id AND aceptado = 1", "fecha_hora DESC LIMIT $step, 20");
        } else {
            $entradas = entradas_cat_usuario::findAll('', "fecha_hora DESC LIMIT $step, 10");
        }

        $comentarios = [];
        foreach ($entradas as $entrada) {
            $comentarios[$entrada->id] = comentarios_cat_usuarios::findAll("entradas_id = $entrada->id AND aceptado = 1", 'fecha_hora DESC');
        }
        $this->render('blog/index', ['entradas' => $entradas,
                                    'comentarios' => $comentarios,
                                    'action' => 'index']);
    }

    function actionUserblog($id = '') {
        //lleva al blog del usuario
        $usuario = $id?
                    usuarios::findByPk($id) :
                    app::instance()->getuser();

        $entradas = entradas_cat_usuario::findAll("usuarios_id = $usuario->id AND aceptado = 1", 'fecha_hora DESC');

        $comentarios = [];
        foreach ($entradas as $entrada) {
            $comentarios[$entrada->id] = comentarios_cat_usuarios::findAll("entradas_id = $entrada->id AND aceptado = 1", 'fecha_hora DESC');
        }

        $hasEntradas = isset($entradas);
        if (!$comentarios) {
            $comentarios = false;
        }

        $this->render('blog/index', ['usuario' => $usuario,
                                    'hasEntradas' => $hasEntradas,
                                    'entradas' => $entradas,
                                    'comentarios' => $comentarios,
                                    'action' => 'userblog']);
    }

    public function actionCreate() { 
        $entrada = new entradas;
        $entrada->setvalues(["usuarios_id" => app::instance()->getuser()->id]);
        $categorias = categorias::findAll();

        if(isset($_POST['entrada'])) {
            $entrada->setvalues($_POST['entrada']);
            if ($entrada->save()) {
                $this->redirect('blog/userblog');
            }
        }

        $this->render('blog/create', ["entrada" => $entrada, "categorias" => $categorias]);
    }

    function actionEntrada($id) {
        $entrada = entradas_cat_usuario::findByPk($id);

        $comentarios = comentarios_cat_usuarios::findAll("entradas_id = $entrada->id AND aceptado = 1", 'fecha_hora DESC');

        $this->render('blog/entrada', ['entrada' => $entrada, 'comentarios' => $comentarios]);
    }

    function actionCreateComentario($uid) {
        $usuarios_id = app::instance()->getuser()->id;
        $comentario = new comentarios;
        $comentario->usuarios_id = $usuarios_id;

        if(isset($_POST['comentario'])) {
            $comentario->setvalues($_POST['comentario']);
            if ($comentario->save()) {
                $this->redirect('blog/index');
            }
        }

        $this->redirect('blog/entrada', ['id' => $comentario->entradas_id]);

    }
}
?>