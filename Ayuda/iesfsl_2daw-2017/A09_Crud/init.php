<?php
require 'usuario.class.php';

$db =  mysqli_connect('localhost', 'root', 'root') 
            or die('No pudo conectarse: ' . mysqli_error());

mysqli_select_db($db, 'blog');



// Devuelve una variable de POST limpia
function varpost($var){
    if(!isset($_POST[$var]))
        return '';
    else
        return htmlspecialchars(addslashes($_POST[$var]), ENT_QUOTES, "UTF-8");
            
}