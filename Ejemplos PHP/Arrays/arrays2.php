<?php 

$email='manolo@hotmail.com';

$partes=explode('@',$email);
$usuario=$partes[0];
$dominio=$partes[1];

//list($usuario.$dominio)=explode('@',$email);

echo $usuario. ' tiene el correo en '.$dominio;

$password='12ggt';

echo md5($password);
?>