<?php

session_start();
//session_destroy();

if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
}else {
    $usuario = null;
}
?>

<html>
<body>
<h1>TIENDA ONLINE</h1>

<?php

if(!$usuario){
    echo "No estas logueado. <a href='login.php'>Entrar </a>";
}else {
    echo "Usuario: ".$usuario['nombre'];
    echo " <a href='logout.php'>Cerrar Sesión</a>";
}

?>