<?php
session_start(['cookie_lifetime' => 60*60*24*30]);
require 'config.php';

$db=mysqli_connect($params['host'],$params['user'],$params['password']) 
        or die("Error al conectar a la BD");
mysqli_select_db($db, $params['dbase']);


/** Ejecuta una consulta y devuelve la primera fila
 * 
 * @global type $db
 * @param type $sql
 */
function queryrow($tabla,$where){
    global $db;

    $query=mysqli_query($db,"select * from $tabla where $where");
    if(!$query) return false;
    return mysqli_fetch_assoc($query);
}
        
/** Devuelve el nombre de usuario logueado
 * 
 * @return string/boolean  Nombre del usuario, o false si no esta logueado
 */
function usuario(){
    if(isset($_SESSION['usuario']))
            return $_SESSION['usuario']['nombre'];
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
    $usuario=queryrow("usuarios","usuario='$usuario'");
    if(!$usuario || $usuario['password']!=md5($pass))
        throw new Exception('Usuario o contraseña incorrecta');
    elseif($usuario['estado']!='A')
        throw new Exception('Usuario no confirmado');
    else {
        $_SESSION['usuario']=$usuario;
        return true;
    }
    
}

function logout(){
    session_destroy();
}
