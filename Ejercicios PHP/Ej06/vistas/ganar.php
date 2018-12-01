<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="style/main.css" />
</head>
<body>
<nav class="navbar navbar-dark bg-dark">MASTERMIND</nav>
    <div class="container">
        <h1>¡¡Has Ganado!!</h1>
        <p>Tardaste <?=$veces?> rondas<?=$veces>1?'s':''?></p>
        <p>Número ganador: <?=$numGanador?><p>
        <?php
            include 'vistas/intentos.php';
        ?>
        <a href="index.php?volver">Juega de nuevo</a>
    <div>
</body>
</html>