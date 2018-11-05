<?php
require "init.php";

require "elementos/cabeceraPa.php";

$id = param('id');
if (!$id){
    die("No has seleccionado artículo");
}
$articulo = getarticulo($id);
if (!$articulo){
    die("ERROR: Articulo inexistente");
}

if (isset($_POST['comprar'])) { //2º paso. Vengo del formulario
    $cantidad = param('cantidad');
    if(is_numeric($cantidad) && $cantidad>0) {
        anadircarrito($id, $cantidad);
        echo "<h3>Artículo añadido al carrito</h3>";
        echo "<a href=carrito.php class=boton>Ver Carrito</a> ";
        echo "<a href='index.php' class=boton>Continuar comprando</a>";
        die;
    } else {
        $error="Cantidad incorrecta";
    }
} else {
    $error="";
}
?>
<h3>Comprar artículo</h2>
<div style="background:#eeeedd;width:300;padding:10px">
    <fieldset>
        <form method=post>
            <b><?= $articulo['titulo'] ?></b>
            <br>Categoría: <?= $categorias[$articulo['cat']] ?>
            <br>Precio: <?= $articulo['precio'] ?> €<br><p>
                Cantidad: <input name="cantidad" size="2" value="1">
                <?php if($error) echo "<div class=error>$error</div>";?>
                <br><input type=submit class=boton name=comprar value="Añadir a carrito">
        </form>
    </fieldset>
</div>
<?php
require 'elementos/piePa.php';
?>