<!DOCTYPE html>
<html>
<body>
    
<?php 
    require "elementos/cabeceraPa.php";
//Analizo param. de entrada
$cat=param("cat");
if($cat && !isset($categorias[$cat])) 
    die("CATEGORIA INEXISTENTE!!");

$filtro=param("filtro");
?>

<h1>Selector</h1>
<form method="GET">
Categoria:
<?php
desplegable('cat',$categorias,$cat);
?>
Nombre:<input type="text" name="filtro" value="<?php echo $filtro; ?>">
<input type="submit" value="Buscar">
</form>

<?php
if($cat || $filtro ) { // Si no se selecciona nada, no se muestran articulos
	if($cat) {
		echo "<h3>Categoría: ".$categorias[$cat].'</h3>';
                $listarticulos=$articulos; // Todos
        }
        
	foreach(getarticulos($cat,$filtro)  as  $id=>$art){

		printf('<div class="art"><b>%s</b><br>%d €<br><br>
			<a href="comprar.php?id=%s" class=boton>Añadir a carrito</a></div>',
				$art['titulo'],$art['precio'],$id);
	}
}
    require ("elementos/piePa.php");
?>

</body>
</html>