<?php
// Cita de un dia, a una hora con un paciente
class Cita
{
    public $agenda;
    public $dia;
    public $hora;
    public $paciente;

    public function __construct($agenda, $dia, $hora, $paciente)
    {
        $this->agenda=$agenda;
        $this->dia=$dia;
        $this->hora=$hora;
        $this->paciente=$paciente;
    }

    public function fechahora()
    {
        return sprintf('%s/%s/%s %s', $this->dia, $this->agenda->getmes(), $this->agenda->anyo, $this->hora);
    }
}

// Citas de un mes-año determinado
class Agenda
{
    private static $horario;
    public $anyo;
    private $mes;

    public static function sethorario($horario)
    {
        self::$horario=$horario;
    }

    public function __construct($anyo, $mes)
    {
        $this->anyo=$anyo;
        $this->setmes($mes);
    }

    public function getmes()
    {
        return $this->mes;
    }

		public function setmes($mes){
			if ($mes<1 or $mes>12) {
					throw new Exception('Mes incorrecto');
			}
			$this->mes=$mes;
		}

		/* Añade una cita. Si es correcta, devuelve el objeto cita creado.
		* Si la hora no es correcta, devuelve -1
		* Si ya hay una cita el dia-hora pasado, devuelve -2
		*
		*/
    public function anadecita($dia, $hora, $paciente)
    {
        if (!in_array($hora, self::$horario)) {
            return -1;
        }
        if (isset($this->citas[$dia][$hora])) {
            return -2;
        }
        $cita=new Cita($this, $dia, $hora, $paciente);
        $this->citas[$dia][$hora]=$cita;
        return $cita;
    }
		/* Devuelve las citas de un paciente
		*
		*/
    public function getcitaspaciente($paciente)
    {
        $ret=[];
        foreach ($this->citas as $dia=>$horas) {
            foreach ($horas as $hora=>$cita) {
                if ($cita->paciente==$paciente) {
                    $ret[]=$cita;
                }
            }
        }
        return $ret;
    }
}
