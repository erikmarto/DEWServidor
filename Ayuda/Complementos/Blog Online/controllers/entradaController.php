<?php

class entradaController extends controller {
    function actionIndex(){
        //findALL = encuentra todos los resultados ()<- , las primeras '' es WHERE y las segundas '' CONDICIONES 
        $entradas=entradas::findAll('','fecha_hora DESC LIMIT 0,10');
        $this->render("usuario/paginaprincipal/index", ["entradas" => $entradas]);
    }
    
	public function actionView($id){
        $entrada=entradas::findByPk($id);
        $this->render("usuario/entradas/view", ["entrada" => $entrada]);
        
    }
    public function actionCreate() {
        $comentario = new comentarios;
        if (isset($_POST['comentario'])) {
            $comentario->setvalues($_POST['comentario']);
            $comentario->usuarios_id=app::instance()->getuser()->id;
            $comentario->aceptado=1;
            if ($comentario->save())
                $this->redirect('entrada/view',['id' => $comentario->entradas_id]);
        }
    }
    

}