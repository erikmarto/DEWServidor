<html>
<header>
	<meta charset='utf-8'>
	<TITLE><?php echo app::instance()->title ?></title>
	<link rel="stylesheet"   type="text/css" href="views/estilo.css">
	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      
</header>
<body >

<span class="logo"><?= app::instance()->name ?></span>
<?php
$isadmin=app::instance()->checkrole('AD');

Mhtml::menu([
	['action'=>'categorias','label'=>'Categorías'],
	['action'=>'titulos','label'=>'Títulos'],
	['action'=>'autores','label'=>'Autores'],
	['action'=>'carrito','label'=>'Carrito'],
	['action'=>'usuarios','label'=>'Usuarios','roles'=>'AD'],
	['action'=>'site/ayuda','label'=>'Ayuda']
]);
?>
<span class="menu">
<?php
if(app::instance()->isLogued()){
	echo app::instance()->user->nombre;
	echo "<a href='?r=site/logout'>(Salir)</a>";
} else
	echo "<a href='?r=site/login'>(Login)</a>";
?>
</span>
<hr>
<h3><?=$this->title?></h3>
<div class="contenido">

<?php
echo $content;
?>

</div>
<hr style='clear:left'><small>
Copyright (2017) Desarrollado con microframework mfp:<a href="mfp/docum/">Documentación</a>
</small>
</body>
</html>


