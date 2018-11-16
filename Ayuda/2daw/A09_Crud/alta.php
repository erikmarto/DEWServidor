<?php
//Alta de usuarios
require 'init.php';

$usuario=new Usuario;
$usuario->estado="P";


//Procesamos formulario
if(isset($_POST['actualiza'])){
    $usuario->nombre=varpost('nombre');
    $usuario->email=varpost('email');
    $usuario->password=varpost('password');
    if($usuario->validate()) {   
        $usuario->password=md5($this->password);
        $sql=sprintf("insert into usuarios (nombre,email,estado)"
            . " values ('%s','%s','%s')",
                $usuario->nombre,$usuario->email,$usuario->estado);

        if(!mysqli_query($db,$sql))
            echo "ERROR AL ACTUALIZAR!!". $sql;
        else {
            $usuario->id=mysqli_insert_id($db); //Código asignado
            header('Location:index.php');
        }
    }
}

$vista='formusuario.php';
require 'vistas/layout.php';
?>
