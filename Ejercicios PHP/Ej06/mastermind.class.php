<?php

class MasterMind {
    
    public function prueba(){
    $valores = array();
    $num = '';
        for($i=0; $i < 4; $i++){
            $num = mt_rand(1,6);
            array_push($valores, $num);
            var_dump($num);
        }
        
    }
    
}

?>