<?php

class blogController extends controller {
    function actionIndex(){
        //$usuarios=usuarios::findAll();
        $entradas=entradas::findAll('','id DESC LIMIT 0,5');
        $this->render("usuario/paginaprincipal/index", ["entradas" => $entradas]);
        //$this->render("usuario/paginaprincipal/index", ["usuarios" => $usuarios]);
    }
    
}