<?php
// Configuración de la aplicación. Se accede con app::instance()->xxx
$config=array(
	'name'=>'Blog',
	'defaultcontroller'=>'blog',
	'dbparams'=>array(
			'connection'=>'mysql:host=localhost;dbname=blog',
			'username'=>'root',
			'password'=>'')
	);

?>
