<?php
// Configuración de la aplicación. Se accede con app::instance()->xxx
$config=array(
	'name'=>'Primer-Blog',
	'defaultcontroller'=>'site',
	'dbparams'=>array(
			'connection'=>'mysql:host=localhost;dbname=test_blog',
			'username'=>'root',
			'password'=>'')
	);

?>
