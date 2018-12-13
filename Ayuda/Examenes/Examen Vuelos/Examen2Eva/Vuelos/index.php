<!DOCTYPE html>
<?php
require 'init.php';

if(isset($_GET['aerop1'])){
	$aerop1=$_GET['aerop1'];
	$aerop2=$_GET['aerop2'];
	$sql='select v.*,a.modelo'
		. ' from vuelos v,aviones a  where a.id=aviones_id '
		.' and v.aeropue1_id='.$_GET['aerop1']
		.' and v.aeropue2_id='.$_GET['aerop2']
		. ' order by fecha';
	
	$vuelos=$db->query($sql);
} else {
	$aerop1='';
	$aerop2='';
}
require 'views/vistaBuscarVuelos.php';
?>