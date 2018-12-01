<?php
class MasterMind{
    private $nivel;
    private $perdido = false;
    private $rondas = [];
    private $numGanador;
    const Nivel = [
        0 => [
            'nombre' => 'Facil',
            'max' => 4,
            'longitud' => 3,
            'intentos' => 7
        ], 
        1 => [
            'nombre' => 'Normal',
            'max' => 6,
            'longitud' => 4,
            'intentos' => 10
        ], 
        2 => [
            'nombre' => 'Difícil',
            'max' => 9,
            'longitud' => 4,
            'intentos' => 13
        ],
    ];

    public function __construct($niv) {
        $this->nivel = $niv ?? 2; 
        $max = MasterMind::Nivel[$niv]['max'] ?? 6; 
        $longitud = MasterMind::Nivel[$niv]['longitud'] ?? 4;

        //numero ganador (random)
        $this->numGanador = range(1, $max);
        shuffle($this->numGanador);
        $this->numGanador = array_slice($this->numGanador, 0, $longitud);
    }
    
    //comprobar si el numero fue jugado
    private function numJugado($n) {
        $jugado = false;
        if (isset($this->rondas[0])) {
            for ($j = 0; $j < count($this->rondas) && !$jugado ;$j++) {
                if ($this->rondas[$j]['numUsuario'] == $n) {
                    $jugado = true;
                }
            }
        }
        return $jugado;
    }
    private function numRepetido($array) {
        return count($array) !== count(array_flip($array));
    }

    private function fueraRango($array) {
        $maxValorPerdidos = false;
        for($j = 0;$j < count($array) && !$maxValorPerdidos ;$j++) {
            if ($array[$j] > MasterMind::Nivel[$this->nivel]['max'] || $array[$j] < 1) {
                $maxValorPerdidos = true;
            }
        }
        return $maxValorPerdidos;
    }
    
    public function validar($numIntentos) {
        $numArray = array_map('intval', str_split($numIntentos));
        if (count($numArray) !== MasterMind::Nivel[$this->nivel]['longitud']) {
            $codigo = 3;
        } else if ($this->numRepetido($numArray)) {
            $codigo = 4;
        } else if ($this->fueraRango($numArray)) {
            $codigo = 5;
        } else if ($this->numJugado($numIntentos)) {
            $codigo = 6;
        } else {
            $codigo = $this->comprobar($numArray);
        }
        return $codigo;
    }

    private function comprobar($numUsuario) {
        $codigo = 0;
        $cubos = [
            'muerto' => 0,
            'herido' => 0
        ];

        foreach($numUsuario as $posicion => $n) {
            if ($n == $this->numGanador[$posicion]) {
                $cubos['muerto']++;
            } else if (in_array($n, $this->numGanador)) {
                $cubos['herido']++;
            }
        }

        if ($cubos['muerto'] == MasterMind::Nivel[$this->nivel]['longitud']) {
            $this->perdido = true;
            $codigo = 1;
        }

        $ronda = [
            'numUsuario' => implode('', $numUsuario),
            'cubos' => $cubos
        ];

        $this->rondas[] = $ronda;

        if ($this->getIntentos() == 0 && $codigo == 0) {
            $codigo = 2;
        }
        return $codigo;
    }

    public function getnumGanador() {
        return implode('', $this->numGanador);
    }

    public function isGameOver() {
        return $this->perdido;
    }

    public function getRondas() {
        return $this->rondas;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getIntentos() {
        return MasterMind::Nivel[$this->nivel]['intentos'] - count($this->rondas);
    }
}
?>