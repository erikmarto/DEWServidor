<?php

class entradas extends model {
    static $tablename="entradas";
    static $attributes;

    public function getUsuario() {
        return usuarios::findByPk($this->parent_id);
    }

    
}
?>