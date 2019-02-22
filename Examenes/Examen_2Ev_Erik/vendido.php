<?php

/* FALTA POR ACABAR */
    require "funciones.php";

    //billete vendido
    echo $_GET['id'];

    //para que no salga un error
    $mensaje = '';

    if(isset($_POST['bus'])) {
        require "conf_init.php";
        $mensaje = asctualizarAsient($consulta_PDO, $_POST['bus']);
    }
?>

<html> 
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<h2>VentaBilletes</h2>
<p><?=$mensaje?></p>
<form method="post">
    <div class="row">
        <div class='col col-md-2'><br>
            <input type=submit class="btn btn-primary" value="Crear">

            <a class="btn btn-primary" href="index.php">Volver</a>

        </div>
    </div>
</form>
</body>
</html>