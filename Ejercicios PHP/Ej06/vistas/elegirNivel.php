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
        <h3>Eligir nivel:</h3>
        <form method="POST">
            <select name="nivel">
            <?php
                foreach(MasterMind::Nivel as $nivel => $datos) {
                    echo "<option value=$nivel>$datos[nombre]</option>";
                }
            ?>
            </select>
            <button class="btn btn-primary">Empezar</button> 
        </form>
    </div>
</body>
</html>