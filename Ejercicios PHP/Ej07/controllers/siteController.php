<?php

class siteController extends controller {

    function actionIndex() {
        $entradas = entradas_cat_usu::findAll('aceptado = 1','id DESC LIMIT 5');
        $this->render('site/index', array('entradas'=>$entradas));
    }
    
}

?>