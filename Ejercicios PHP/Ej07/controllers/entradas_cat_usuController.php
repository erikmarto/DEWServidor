<?php

class entradas_cat_usuController extends controller {

    function actionView($id) {
        $entrada = entradas_cat_usu::findByPk($id);
        $this->render('entradas/view', ['entrada'=>$entrada]);
    }

}

?>