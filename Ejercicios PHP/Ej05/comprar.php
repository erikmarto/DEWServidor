<?php
require "init.php";

require "elementos/cabeceraPa.php";

$id = param('id');
if (!$id) {
    die("No has seleccionado artículo");
}
$articulo = getArticulo($id);
if (!$articulo) {
    die("ERROR: Articulo inexistente");
}

if (isset($_POST['comprar'])) {
    $cantidad = param('cantidad');
    if(is_numeric($cantidad) && $cantidad > 0) {
        anadirCarrito($id, $cantidad);
        echo "<h3>Artículo añadido al carrito</h3>";
        echo "<a href=carrito.php class='btn btn-primary'>Carrito</a> ";
        echo "<a href='index.php' class='btn btn-primary'>Continuar Comprando</a>";
        die;
    } else {
        $error="Cantidad incorrecta";
    }
} else {
    $error="";
}
?>

<h3>Comprar artículo</h2>
<div class='compra'>
    <form method='post' style="margin-left: 20px;">
        Producto:<b> <?= strtoupper($articulo['titulo']) ?></b>
        <br>Categoría: <?= $categorias[$articulo['cat']] ?>
        <br>Precio: <?= $articulo['precio'] ?> € 
        <br> Cantidad: <input name="cantidad" size="2" value="1"><br> 
            <?php if($error){ echo "<div class='error'>$error</div>"; }?>
            <br><input type='submit' class='btn btn-primary' name='comprar' value="Añadir a carrito">
    </form>
</div>