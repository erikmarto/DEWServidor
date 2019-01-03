<?php

class comentarios extends model {
    static $tablename="comentarios";
    static $attributes;


    function getUsuario() {
        return usuarios::findByPk($this->usuarios_id);
    }
}
?>