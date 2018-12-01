<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MASTERMIND</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="style/main.css" />
</head>
<body>
<nav class="navbar navbar-dark bg-dark">MASTERMIND</nav>
    <div class="container">
    <p><?=$numGanador?>*</p>
        <h3>Introduzca un número:</h3>
        <p class="errores"><?=$erroresMsg?></p>
        <form method="POST">
            <input type="number" name="input" placeholder="Longitud: <?=$longNum?> cifras">
            <button class="btn btn-primary">Comprobar</button>
        </form>
        <p class="cabecera">Intentos: <?=$intentos?></p>
        <?php
            include 'intentos.php';
        ?>
        <a href="index.php?volver">Volver a empezar</a>
    </div>
</body>
</html>