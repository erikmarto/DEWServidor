<?php
session_start(['cookie_lifetime' => 60*60*24*30]);

/** Devuelve el nombre de usuario logueado
 * 
 * @return string/boolean  Nombre del usuario, o false si no esta logueado
 */
function usuario(){
    if(isset($_SESSION['usuario']))
            return $_SESSION['usuario'];
    else
        return false;
}

/** Login de un usuario
 * 
 * @param type $usuario
 * @param type $pass
 * @return boolean  Devuelve true o false si es correcto o no
 */
function login($usuario,$pass){
    $usuarios=array('admin'=>'1234','pepe'=>'pepe');
    if(!isset($usuarios[$usuario]) || $usuarios[$usuario]!=$pass)
        return false;
    else {
        $_SESSION['usuario']=$usuario;
        return true;
    }
    
}

function logout(){
    session_destroy();
}
