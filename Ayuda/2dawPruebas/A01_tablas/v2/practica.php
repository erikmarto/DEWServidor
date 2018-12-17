<?php

if(!isset($_GET['tabla']))
    //die('No has pasado la tabla!!');
    header('Location:index.php');

$tabla=$_GET['tabla'];
?>
<html>
    <head>
        <style>
            form{font-size:3em}
            #respuesta {font-size:1.3em}
        </style>
    </head>
    <body>

<?php
if(isset($_GET['enviar'])) { //Venimos del formulario
   
    if(!isset($_GET['pregunta']) || !isset($_GET['respuesta']))
        die('Ejecución incorrecta');

    $pregunta=$_GET['pregunta'];
    $respuesta=$_GET['respuesta'];
    if($tabla*$pregunta==$respuesta) {
        $mensaje='CORRECTO!!';
        $pregunta=rand(1,10);
        $respuesta='';
    }else
        $mensaje='No es correcto!!!';
    
} else {
    $mensaje='';
    $pregunta=rand(1,10);
    $respuesta='';
}

?>
    <h2>Practicando la tabla del <?= $tabla ?> </h2> 
    <form >
        <input type='hidden' name='tabla' value='<?=$tabla?>'>
        <input type='hidden' name='pregunta' value='<?=$pregunta?>'>
        <?php echo "$tabla x $pregunta = ";?>
        <input id='respuesta' name='respuesta' value='<?=$respuesta?>' size='3'>
        <span style='color:red'><?=$mensaje?></span><br>
        <input type='submit' name='enviar' value='COMPRUEBA!'>
    </form>
    </body>
</html>    




