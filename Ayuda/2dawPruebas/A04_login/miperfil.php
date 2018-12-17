<?php
require 'init.php';

if (!usuario()) 
    header('Location:login.php');


//Aqui cargariamos los datos del usuario ,mostrariamos el formulario...
require 'cabecera.php';

?>

        <?php echo "Te llamas ".usuario();?>
    </body>
</html>