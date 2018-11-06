<?php
/** Muestra el carrito
 * Permite borrar articulos del carrito, recibiendo borrar=id por GET
 */

require "init.php";


//Analizo param. de entrada
$id=param("borrar");
if($id) {
    borrarcarrito($id);
}
require ("elementos/cabeceraPa.php");
if(!isset($_SESSION['carrito'])) {
	echo "El carrito está vacío";
	die;
}
?>
<h3>Carrito</h3>
<table border="1"><tr><th>Artículo</th><th>Descripción</th><th>Cantidad</th><th>Precio</th><th>Importe</th><th></th></tr>
<?php
	$importe=0;

	foreach($_SESSION['carrito']  as  $id=>$cantidad){

		$articulo=getarticulo($id);
		$importe=$cantidad*$articulo['precio'];
		printf('<tr><td>%s</td><td>%s</td><td>%d</td><td>%d</td><td>%d €</td>
			<td><a class="btn btn-danger" href="carrito.php?borrar=%s">Borrar</a></tr>',
			$id,$articulo['titulo'],$cantidad,$articulo['precio'],$cantidad*$articulo['precio'],$id);

	}
	echo "<tr><td colspan='4'></td><td>TOTAL</td><td align='right'>".$importe.' €</tr>';
?>
</table>
<p>
<a class="btn btn-primary" href="index.php">Seguir comprando</a>
<a class="btn btn-success" href="https://www.paypal.com/es/home">Finaliza pedido</a>
