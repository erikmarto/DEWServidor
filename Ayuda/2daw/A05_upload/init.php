<?php
//Variables generales de la aplicación

// Ruta donde están las fotos
$fotos='./fotos';
//Tamaño de imagenes en la presentación (height)
$tamimagen=150;

function buscarcara($imagen){
    require_once "lib/php-facedetection-master/FaceDetector.php";
    $face_detect = new svay\FaceDetector('lib/php-facedetection-master/detection.dat');
    $face_detect->facedetect($imagen);
    //$face_detect->toJpeg(); 
    //$face_detect->cropFaceToJpeg(); 
    
    $cara = $face_detect->getFace();
    return $cara;
}
?> 