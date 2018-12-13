<?php
class cita{
//COMPLETAR
}


class agenda {


	public $citas=array();

	/** Añade una cita para un dia/hora para un paciente
	 *
	 * @param type $dia
	 * @param type $hora
	 * @param type $paciente
	 * @return Si ya hay una cita ese dia/hora devuelve false. Si no, true
	 */
	public function anadircita($dia,$hora,$paciente){

	}

	/** Borra la cita de un dia/hora
	 *
	 * @param type $dia
	 * @param type $hora
	 */
	public function borrarcita($dia,$hora){

	}

	/** Devuelve un array de citas del dia que se le pasa
	 *
	 * @param type $dia
	 */
	public function getcitasdia($dia){

	}
	public function getcitaspaciente($paciente){
		
	}
}

