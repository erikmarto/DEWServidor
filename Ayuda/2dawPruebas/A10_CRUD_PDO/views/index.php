<?php
require 'lib/Mhtml.php';
?>
<h2>Títulos</h2>
<form class='fsearch' >
	<input name='buscar'  value='<?=$buscar?>'><input class='btn btn-success' type='submit' value='Buscar'>
</form>
<a href='create.php' class='btn btn-primary'>Alta</a>

<br>&nbsp; 
<form action="cambiagenero.php" method="post">
<table class='table table-striped'>
<tr><td colspan='2' class='pagination'>
<?php
printf("(%d/%d)",$inicio+1,$inicio+$totalpag);
if($pag>1) echo "<a class='btn btn-info btn-sm' href='?buscar=$buscar&pag=".($pag-1)."'>&lt;Anterior</a>";
echo "&nbsp; <a class='btn btn-info btn-sm' href=?buscar=$buscar&pag=".($pag+1).">Siguiente&gt;</a>";
?>
</td></tr>
<tr><th>Título</th><th>Autor</th><th>Género</th></tr>
<?php

foreach($titulos as $titulo){
	printf("<tr><td><a href=view.php?id=%s>%s</td><td>%s</td><td>%s</td><td>"
            . "<input type=checkbox name='ids[]' value=%d></tr>",
			$titulo['id'],$titulo['titulo'],$titulo['autor'],$titulo['categoria'],$titulo['id']);
}
?>
</table>
Con los seleccionados cambiar el género a: 
<?php
$categorias=listData('categorias','id','nombre');
desplegable('categoria_id','',$categorias);
?>
<input type=submit value="Cambiar" class='btn btn-primary '>
</form>



