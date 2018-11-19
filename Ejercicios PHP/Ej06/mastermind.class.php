<?php

class MasterMind {
    public $valores = [];

    public function prueba() {
        for ($i = 0; $i < 4; $i++) {
            $num = mt_rand(1,6);
            array_push($this->valores, $num);
            var_dump($num);
        }
        return $num;
    }
}

?>