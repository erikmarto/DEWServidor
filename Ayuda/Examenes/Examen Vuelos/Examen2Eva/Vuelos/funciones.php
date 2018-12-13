<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function param($p,$valdefecto=""){
	if(isset($_REQUEST[$p]))
		return $_REQUEST[$p];
	else
		return $valdefecto;
}

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
function listData($db,$tabla,$columnadescri,$where=''){
	$sql="select id,$columnadescri from $tabla ";
	if($where) $sql.=' where '.$where;
	$sql.=" order by 2";
	
	foreach($db->query($sql) as $r)
		$ret[$r['id']]=$r[$columnadescri];
	return $ret;
}
