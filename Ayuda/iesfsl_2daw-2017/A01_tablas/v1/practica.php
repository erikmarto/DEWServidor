<html>
    <head>
        <style>
            form{font-size:3em}
            #respuesta {font-size:1.3em}
        </style>
    </head>
    <body>
<?php

if(!isset($_GET['tabla']))
    die('No has pasado la tabla!!');

$tabla=$_GET['tabla'];
$pregunta=rand(1,10);
?>
    <h2>Practicando la tabla del <?= $tabla ?> </h2> 
    <form action='evalua.php'>
        <input type='hidden' name='tabla' value='<?=$tabla?>'>
        <input type='hidden' name='pregunta' value='<?=$pregunta?>'>
        <?php echo "$tabla x $pregunta = ";?>
        <input id='respuesta' name='respuesta' size='3'>
        <input type='submit' name='enviar' value='COMPRUEBA!'>
    </form>
    </body>
</html>    




