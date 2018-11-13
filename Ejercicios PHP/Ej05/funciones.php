<?php
// Devuelve un articulo
function getArticulo($id){
    global $articulos;
    if (!isset($articulos[$id])) {
        return false;
    } else {
        return $articulos[$id];
    }
}

// Devuelve los articulos
function getArticulos($cat = '', $nombre = '') {
    global $articulos;
    if (!$cat && !$nombre) {
        return $articulos;
    } else {
        $arts=[];
        foreach ($articulos as $id => $art) {
            if ($cat && $art['cat']!=$cat) continue;
            if ($nombre && strpos($art['titulo'],$nombre)===false) continue;
            $arts[$id]=$art;
        }
        return $arts;
    }
}

//Añadir
function anadirCarrito($id, $cantidad = 1) {
	if (isset($_SESSION['carrito'][$id])) {
		$_SESSION['carrito'][$id]+=$cantidad;
	} else {
        $_SESSION['carrito'][$id]=$cantidad;
    }
}

//Borrar
function borrarCarrito($id, $cantidad = 1) {
	if (isset($_SESSION['carrito'][$id])) {
        unset($_SESSION['carrito'][$id]);
    }
}

//Parámetro
function param($p, $valdefecto="") {
	if (isset($_REQUEST[$p])) {
		return $_REQUEST[$p];
	} else {
        return $valdefecto;
    }
}

//Desplegable
function desplegable($name, $lista, $valorselecc) {
	echo "<select name='$name'>";
	echo "<option value=''>Select</option>";
	foreach ($lista as $valor => $descripcion) {
		$selected = $valor == $valorselecc ? "selected" :"";
		echo "<option $selected value='$valor'>$descripcion</option>";
	}
	echo "</select>";
}
?>
