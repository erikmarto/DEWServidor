<?php

Mhtml::verticalview($usuario,['nombre','email','reader']);
?>

<b>Títulos Subidos</b>
<?php
foreach($usuario->titulos as $titulo){
	echo "<li>";
	Mhtml::actionlink('titulos/view',$titulo->titulo,['id'=>$titulo->id]);
	echo ' - ';
	Mhtml::actionlink('categorias/view',$titulo->categoria,['id'=>$titulo->categoria_id]);
}