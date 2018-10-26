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

$nombre = '';
$edad = '';
$correo  = '';
$sexo = '';
$obser = '';
$cont = '';
$cond = '';
$error=[];

if(isset($_POST['envio'])){

    //Validamos nombre
    if (!isset($_POST['nombre']) or !$_POST['nombre']) {
        $error['nombre']= "Error: el nombre es requerido.";
    } else {
    $nombre=$_POST['nombre'];
        if(strlen($nombre)<3) {
            $error['nombre']='La longitud mínima es de tres caracteres.';
        }
        if(is_numeric($nombre)){
        $error['nombre']='¿Tienes número de serie?';
        }
    }

    //Validamos edad
    if (!isset($_POST['edad']) or !$_POST['edad']) {
        $error['edad']= "Error: no ha escrito su edad.";
    } else {
    $edad=$_POST['edad'];
        if($edad < 1 || $edad > 100) {
            $error['edad']='La edad no está entre 1 y 100 años.';
        }
    }

    //Validamos correo
    if (!isset($_POST['correo']) or !$_POST['correo']) {
        $error['correo']= "Error: no ha escrito su dirección de correo.";
    } else {
    $correo=$_POST['correo'];
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $error['correo']='No ha escrito una dirección de correo correcta.';
        }
    }

    //Validamos observaciones
    if (isset($_POST['observaciones'])) {
        $obser= $_POST['observaciones'];
    }

    //Validamos genero
    if (!isset($_POST['genero'])) {
        $error['genero']= "Error: no ha indicado su sexo.";
    } else {
        if(isset($_POST['genero'])) {
            $sexo=$_POST['genero'];
        }
    }

    //Validamos contraseña
    if (!isset($_POST['contraseña']) or !$_POST['contraseña']) {
        $error['contraseña']= "Error: no ha escrito ninguna contraseña.";
    } else {
    $cont=$_POST['contraseña'];
        if(strlen($cont) < 6 ) {
            $error['contraseña']='La contraseña no contiene al menos 6 digitos.';
        }
    }

    //Validamos condiciones
    if (!isset($_POST['condiciones'])) {
        $error['condiciones']= "Error: no ha indicado si acepta las condiciones.";
    }


    if(!count($error)){
    //Guardaríamos en la BD    
    echo "<h1>Registro correcto</h1> <br>"; 
    echo "Nombre: ".$nombre."<br>";
    echo "Edad: ".$edad."<br>";
    echo "Correo: ".$correo."<br>";
    echo "Genero: ".$sexo."<br>";
    echo "Observaciones: ".$obser."<br>";
    echo "Contraseña: Correcta <br>";
    echo "Aceptaste los terminos: Correcto <br>";
    die();
    }
}
?>


