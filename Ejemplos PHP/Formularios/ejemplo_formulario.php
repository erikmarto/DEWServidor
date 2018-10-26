<?php

/* Muestra el error de un dato del formulario, si existe 
* $errores: array de errores
* $dato: dato del que se quiere mostrar el error
*/
function varerror ($errores, $dato){
    if(isset($errores[$dato]) ){
    echo "<div style='color:red'>".$errores[$dato]."</div>";
}
}


$nombre='';
$error=[];
if(isset($_POST['envio'])){

    //Validamos nombre
    if (!isset($_POST['nombre']) or !$_POST['nombre']) {
        $error['nombre']= "Error: el nombre es requerido.";
    } else {
    $nombre=$_POST['nombre'];
        if(strlen($nombre)<3) 
            $error['nombre']='La longitud mínima es de tres caracteres';
        if(is_numeric($nombre))
        $error['nombre']='¿Tienes número de serie?';
        }


        if(!count($error)){
        //Guardaríamos en la BD    
    echo "Registro correcto ".$nombre;
    die();
    }
}
?>
<html><body>
<h2>Registro de Usuario</h2>
<form method="POST">
    <div>Nombre: <input type="text" name="nombre" value="<?=$nombre?>" /> </div>

    <?= varerror($error, 'nombre');
    ?>
    
    Edad: <input type="number" name="edad">
    Acepto las condiciones: <input type="checkbox" name="condiciones">
    <p> <input type="submit" name="envio" value="Enviar" /></p>
</form>
</body>
</html>