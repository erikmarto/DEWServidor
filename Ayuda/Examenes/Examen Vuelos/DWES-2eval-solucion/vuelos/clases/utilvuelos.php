<?php
class utilvuelos {
	public $vuelo; //Datos del vuelo

	/** Carga un vuelo, para poder gestionarlo
	 *
	 * @param type $aviones_id
	 */
	function load($id){
		global $db;
		$sql='select v.*,a.modelo,a.filas,a.asientosfila,ao.codigo as origen,ad.codigo as destino'
				. ' from vuelos v,aviones a,aeropuertos ao,aeropuertos ad '
				. ' where a.id=aviones_id and ao.id=aeropue1_id and ad.id=aeropue2_id'
				. ' and v.id='.$id;
		$this->vuelo=$db->query($sql)->fetch();
	}

	/** Crea los asientos del vuelo activo en la tabla asientos. Se crean vacíos (pasajero y precio a null)
	 * En total, filas x asientosfila asientos, númerados del 001 en adelante
	 * (Si los quieres númerar en la forma tradicional: 01A, 01B, etc.. mucho mejor)
	 */
	function crearasientos(){
		global $db;
		$asfila='ABCDEFGH';
		$ins=$db->prepare('insert into asientos (vuelos_id,asiento) values(:v,:a)');
		for($f=0;$f<$this->vuelo['filas'];$f++)
			for($a=0;$a<$this->vuelo['asientosfila'];$a++){
				$asiento=sprintf('%2d%s',$f+1,$asfila[$a]); 
				$ins->execute(array(':v'=>$this->vuelo['id'],':a'=>$asiento));
			}

	}

	/** Reserva un asiento, asignándole el nombre al pasajero y poniendo
	 * como precio el que tenga el vuelo en este momento
	 *
	 */
	function reservaasiento($asientos_id,$pasajero){
		global $db;
		$sql='update asientos set pasajero=:pasajero,precio=:precio where id=:id';
		$db->prepare($sql)->execute(
				array(':pasajero'=>$pasajero,
					  ':precio'=>$this->vuelo['precio'],
					  ':id'=>$asientos_id
				));
	}



}