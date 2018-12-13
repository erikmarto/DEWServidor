<?php

// Funciones generales. Utilizables en cualquier aplicación

/**
* Devuelve un parámetro de entrada por GET o POST
*/
function param($p,$valdefecto=""){
	if(isset($_REQUEST[$p]))
		return $_REQUEST[$p];
	else
		return $valdefecto;
}

/** Crea un desplegable
 *
 * @param type $lista Array de valor=>descri
 * @param type $valorselecc Valor seleccionado
 */
function desplegable($name,$lista,$valorselecc=''){
	echo "<select name='$name'>";
	echo "<option value=''>Seleccione</option>";
	foreach($lista as $valor=>$descri){
		//$selected=$valor==$valorselecc ? "selected" :"";
		if($valor==$valorselecc)
			$selected="selected";
		else
			$selected="";

		echo "<option $selected value='$valor'>$descri</option>";
	}

	echo "</select>";

}
/**
 * Devuelve datos de una tabla de la BD como un array de la forma id=>valor de columnadescri
 * para poder utilizar en "despeglable"
 * @param type $db
 * @param type $tabla
 * @param type $columnavalor
 * @param type $columnadescri
 * @param type $where Condición a poner en la selección de valores
 */
function listData($db,$tabla,$columnadescri,$where=''){
	$sql="select id,$columnadescri from $tabla ";
	if($where) $sql.=' where '.$where;
	$sql.=" order by 2";
	
	foreach($db->query($sql) as $r)
		$ret[$r['id']]=$r[$columnadescri];
	return $ret;
}



?>
