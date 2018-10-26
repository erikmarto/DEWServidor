<?php
session_start();

echo "<h1>LOGIN</h1>";
echo "<form method='Post'>";
echo "Introduce el usuario: <input type='text' name='usuario'/><br>";
echo "Introduce la contraseña: <input type='password' name='password'/><br>";
echo "<input type='submit' name='envio' value='Comprobar'/>";
echo "</form>";

if (!isset($_POST['usuario']) && !isset($_POST['password'])){

    echo "Introduce tu usuario";

}else{

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if ($usuario=='admin' && $password=='admin') {

        $_SESSION['usuario']=['usuario'=> 'admin','password'=> 'admin'];
        echo "Login correcto! <a href='index.php'> Volver al inicio </a>";

    }else {

        echo "Usuario incorrecto";

    }
}

?>