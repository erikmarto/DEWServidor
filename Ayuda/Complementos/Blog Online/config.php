<?php
// Configuración de la aplicación. Se accede con app::instance()->xxx
$config=array(
	'name'=>'Bloggon',
	'defaultcontroller'=>'blog',
	'dbparams'=>array(
			'connection'=>'mysql:host=localhost;dbname=test_blog',
			'username'=>'root',
			'password'=>'')
	);

?>
