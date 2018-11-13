<html>
    <head>
        <style>
            .mensaje{font-size:3em}
        </style>
    </head>
    <body>
<?php

if(!isset($_GET['tabla']) || !isset($_GET['pregunta']) || !isset($_GET['respuesta']))
        die('Ejecución incorrecta');

$tabla=$_GET['tabla'];
$pregunta=$_GET['pregunta'];
$respuesta=$_GET['respuesta'];

if($tabla*$pregunta==$respuesta)
    echo '<div class=mensaje> MUY BIEN!!!</div>';
else
    echo "<div class=mensaje>Nooo.. $tabla x $pregunta son ".$tabla*$pregunta.'</div>';
?>
<hr><a href='practica.php?tabla=<?=$tabla?>'>CONTINUAR</a>

</body>
</html>

