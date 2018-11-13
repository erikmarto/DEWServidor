<?php
//Modifica un usuario
// Recibe la id por GET y los datos del formulario por POST

require 'init.php';

if(!isset($_GET['id'])) die("Error de ejecución");
$id=$_GET['id'];

$query=mysqli_query($db,'select * from usuarios where id='.$id);
$usuario= mysqli_fetch_object($query,'Usuario');

if(!$usuario) die("Usuario inexistente");

$usuario->_isnew=false;

//Procesamos formulario
if(isset($_POST['actualiza'])){
    $usuario->nombre=varpost('nombre');
    $usuario->email=varpost('email');
    if(varpost('password')!=$usuario->password) // Se ha cambiado
        $usuario->password=varpost('password');
    if($usuario->validate()){
        if(strlen($usuario->password)!=32) //Se ha cambiado·
            $usuario->password=md5($usuario->password);
        $sql=sprintf("update usuarios set nombre='%s',email='%s',estado='%s' where id=%d",
                    $usuario->nombre,$usuario->email,$usuario->password,$usuario->id);

        if(!mysqli_query($db,$sql))
            echo "ERROR AL ACTUALIZAR!!". $sql;
        else
            header('Location:index.php');
    }
}

$vista='formusuario.php';
require 'vistas/layout.php';
?>
