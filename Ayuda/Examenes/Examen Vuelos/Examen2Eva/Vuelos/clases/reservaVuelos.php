<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class reservaVuelos{
    public $vuelo;
    
    function cargarVuelo($id){
        global $db;
		$sql='select v.*,a.modelo,a.filas,a.asientosfila,ao.codigo as origen,ad.codigo as destino'
				. ' from vuelos v,aviones a,aeropuertos ao,aeropuertos ad '
				. ' where a.id=aviones_id and ao.id=aeropue1_id and ad.id=aeropue2_id'
				. ' and v.id='.$id;
		$this->vuelo=$db->query($sql)->fetch();
    }
    
    function crearAsientos(){
		global $db;
		$asfila='ABCDEFGH';
		$ins=$db->prepare('insert into asientos (vuelos_id,asiento) values(:v,:a)');
		for($f=0;$f<$this->vuelo['filas'];$f++)
			for($a=0;$a<$this->vuelo['asientosfila'];$a++){
				$asiento=sprintf('%2d%s',$f+1,$asfila[$a]); 
				$ins->execute(array(':v'=>$this->vuelo['id'],':a'=>$asiento));
			}

	}
    function reservaAsientos($asientos_id,$pasajero){
        global $db;
        $sql="update asiento set pasajero=:pasajero, precio=:precio where id=:id";
        $db->prepare($sql)->execute(
                array(
                    ':pasajero'=>$pasajero,
                    ':precio'=>$this->vuelo['precio'],
                    ':id'=>$asientos_id
                ) 
                
                );
    }
}