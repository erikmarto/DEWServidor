<?php

session_name('tienda 1');
session_start();


if (!isset($_SESSION['contador'])) {
    $_SESSION['contador']=1;
    $usuario='pepe';
    $_SESSION['usuario']=$usuario;
}else{
    $_SESSION['contador']++;
}

if($_SESSION['contador']==1){
    echo 'Bienvenido/a!!';
}else{
    echo $_SESSION['usuario']. "Ya has entrado ".$_SESSION['contador']." veces";
}

?>