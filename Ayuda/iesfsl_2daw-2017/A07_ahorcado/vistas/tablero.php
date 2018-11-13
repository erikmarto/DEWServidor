<html>
    <head>
        <style>
            body{font-family:Verdana}
            a:visited{text-decoration:none}
            .letra{font-size:1.5em}
            tablero{width:70%;margin:auto;background-color:#e2f6ed }
            .letras{padding:7px;font-size:2em;border:1px solid;margin:auto}
            .mensaje{background:#faa;padding:6px}
        </style>
        <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    </head>
</head>    
<body>
    <div class="tablero col col-md-7 col-md-offset-4">
    <h2>AHORCADO</h2>
        <?php
        if ($verpeli)
            echo "(La pelicula es " . $ahorcado->getpeliculastr() . ") ";
        ?>
        <a href="?start=1" class='btn btn-primary'>Empezar de nuevo</a><hr>

        <div class=letras >
            <?php
// Pintamos la pelicula (rayas para las letras no adivinadas)
            foreach ($ahorcado->getpelicula() as $letra) {
                if (!$ahorcado->letrajugada($letra))
                    if ($letra == ' ')
                        echo '&nbsp;&nbsp;';
                    else
                        echo "_ ";
                else
                    echo $letra . ' ';
            }
            ?>
        </div>
        <p>
        <div style='background:#e2f6ed;padding:3px'>Letras ya jugadas: 
            <?php
            echo implode(' ', $ahorcado->getletrasjugadas());
            if ($ahorcado->getfallos())
                echo '<br>Fallos: ' . $ahorcado->getfallos();
            ?>
        </div>
        <p>

            <?php
            for ($i = ord('A'); $i <= ord('Z'); $i++) {
                $letra = chr($i);
                if (!$ahorcado->letrajugada($letra))
                    echo "<a class=letra href='?letra=$letra'>$letra</a> ";
            }
            ?>
        <form >
            Letra:<input name="letra" size="1" style='font-size:1.4em'>
            <input type="submit" value="Jugar" class='btn btn-success'>
        </form>
        <?php
        if (isset($mensaje))
            echo "<span class=mensaje>$mensaje</span>";
        ?>
    </div>
</body>
</html>
