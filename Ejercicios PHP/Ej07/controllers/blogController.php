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
            $entradas = entradas_cat_usuario::findAll('aceptado = 1', "fecha_hora DESC LIMIT $step, 10");
        }

        $comentarios = [];
        foreach ($entradas as $entrada) {
            $comentarios[$entrada->id] = comentarios::findAll("entradas_id = $entrada->id AND aceptado = 1", 'fecha_hora ASC');
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
            $comentarios[$entrada->id] = comentarios::findAll("entradas_id = $entrada->id AND aceptado = 1", 'fecha_hora ASC');
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

        $comentarios = comentarios::findAll("entradas_id = $entrada->id AND aceptado = 1", 'fecha_hora ASC');

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

    function actionSearch() {

        if(isset($_POST['search'])) {
            $where = '';
            if ($_POST['search']['categorias_id'] == -1) {
                unset($_POST['search']['categorias_id']);
            }
            foreach($_POST['search'] as $k => $v) {
                if ($v) {
                    $where.="$k LIKE '%$v%' AND ";
                }
                
            }
            $where .= "aceptado = 1";
            //sanear en caso de que el framework no lo haga por defecto
            $entradas = entradas_cat_usuario::findAll($where, 'fecha_hora ASC');

            $comentarios = [];
            foreach ($entradas as $entrada) {
                $comentarios[$entrada->id] = comentarios::findAll("entradas_id = $entrada->id AND aceptado = 1", 'fecha_hora ASC');
            }
        } else {
            $this->redirect('blog/index');
        }

        
        $this->render('blog/index', ['entradas' => $entradas,
                                    'comentarios' => $comentarios,
                                    'action' => 'search']);
    }
}
?>