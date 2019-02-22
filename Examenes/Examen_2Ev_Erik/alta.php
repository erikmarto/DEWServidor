<?php
    require "funciones.php";

    //para que no salga un error
    $mensaje = '';

    if(isset($_POST['alta'])) {
        require "conf_init.php";
        $mensaje = crearTransp($consulta_PDO, $_POST['alta']);
    }
?>

<html> 
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<h2>Autobuses ALSA - Alta </h2>

<p><?=$mensaje?></p>

<form method="post">
    <div class='col col-md-2'>
        <label for="destino">Destino</label>
        <input class='form-control' id="destino" name="alta[destino]" >
    </div>
    <div class='col col-md-2'>
        <label for="fecha">Fecha</label>
        <input  class='form-control' id="fecha" name="alta[fecha]" type="date">
    </div>
    <div class='col col-md-1'>
        <label for="plazas">Plazas</label>
        <input  class='form-control' id="plazas" name="alta[plazas]">
    </div>
    <div class='col col-md-2'><br>
        <input type=submit class="btn btn-primary" value="Crear">

        <a class="btn btn-primary" href="index.php">Volver</a>

    </div>
</form>
</body>
</html>
