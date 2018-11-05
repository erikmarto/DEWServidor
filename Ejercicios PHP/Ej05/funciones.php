<?php


/** Devuelve un articulo buscando id y lo devuelve. Si no lo encuentra, devuelve false
 * 
 * @global type $articulos
 * @param type $id
 * @return boolean articulo o false
 */
function getarticulo($id){
    global $articulos;
    if(!isset($articulos[$id]))
        return false;
    else
        return $articulos[$id];
}

/** Devuelve los articulos , filtrando por categoria y/o por nombre 
 * 
 * @param type $cat  Codigo de categoria
 * @param type $nombre  Nombre del articulo (no es necesario que sea completo)
 */
function getarticulos($cat='',$nombre=''){
    global $articulos;
    if(!$cat && !$nombre)  //TOdos
        return $articulos;
    else {
        $arts=[];
        foreach($articulos as $id=>$art){
            if($cat && $art['cat']!=$cat) continue;
            if($nombre && strpos($art['titulo'],$nombre)===false) continue;
            $arts[$id]=$art;
        }
        return $arts;
    }
}

/** Añade un artículo al carrito
 *
 * @param type $id
 * @param type $cantidad
 */
function anadircarrito($id,$cantidad=1){
	if(isset($_SESSION['carrito'][$id]))
		$_SESSION['carrito'][$id]+=$cantidad;
	else
		$_SESSION['carrito'][$id]=$cantidad;
}

/** Borra un artículo del carrito
 *
 * @param type $id
 * @param type $cantidad
 */
function borrarcarrito($id,$cantidad=1){
	if(isset($_SESSION['carrito'][$id]))
		unset($_SESSION['carrito'][$id]);
}






// Funciones generales. Utilizables en cualquier aplicación


/**
* Devuelve un parámetro de entrada por GET o POST
*/
function param($p,$valdefecto=""){
	if(isset($_REQUEST[$p]))
		return $_REQUEST[$p];
	else
		return $valdefecto;
}

/** Crea un desplegable
 *
 * @param type $lista Array de valor=>descri
 * @param type $valorselecc Valor seleccionado
 */
function desplegable($name,$lista,$valorselecc){
	echo "<select name='$name'>";
	echo "<option value=''>Seleccione</option>";
	foreach($lista as $valor=>$descri){
		$selected=$valor==$valorselecc ? "selected" :"";
		echo "<option $selected value='$valor'>$descri</option>";
	}

	echo "</select>";

}



?>
