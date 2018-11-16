<?php
session_start();
if(!isset($_SESSION['bolas']))
  $_SESSION['bolas']=[];
if(isset($_POST['acc'])){
    switch($_POST['acc']) {
      case 'Marcar':
          $bola=$_POST['bola'];
          if($bola>=1 and $bola<=90){
            if(isset($_SESSION['bolas'][$bola]))
              unset($_SESSION['bolas'][$bola]);
            else
              $_SESSION['bolas'][$bola]=1;
          }
          break;
      case 'Deshacer':
          array_pop($_SESSION['bolas']);
          break;
      case 'Empezar':
          $_SESSION['bolas']=[];
    }
  }
$bolas=$_SESSION['bolas'];

require 'vista.php';
 ?>
