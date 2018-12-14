<?php
// Configuración de la aplicación. Se accede con app::instance()->xxx
$config=array(
	'name'=>'Blogtor',
	'defaultcontroller'=>'blog',
	'dbparams'=>array(
			'connection'=>'mysql:host=localhost;dbname=blogtor',
			'username'=>'root',
			'password'=>'')
	);

?>
