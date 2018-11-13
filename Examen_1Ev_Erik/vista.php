<html>
    <head>
        <style>
            body{
                font-family:Verdana;
            }

            .probador {
                font-size:1.2em;
                padding:10px;
                margin:8px;
                background:blue;
                width:110px;
                color:white;
            }

            .prendas {
                font-size:3em;
                padding:10px;
                text-align: center;
            }

            .boton{
                font-weight: bold;
                background-color: gainsboro;
                border: 1px solid black;
                width: 180px;
                height: 50px;
                margin: 20px 4px 4px 4px;
                padding: 3px;
                color: blue;
                font-size: 25px;
            }

            .boton a{
                text-decoration:none;
            }

            .titulo{
                font-size:1.2em;
                background-color: gainsboro;
            }

        </style>
    </head>
    <body>

        <h2>PROBADORES</h2>
        <?php 
        if (isset($error)) {
            echo $error;
        }
        ?>
        <table border="1"><tr class="titulo"><th>Probador</th><th>Prendas</th><th>Hora</th></tr>

        <?php foreach($_SESSION['probador'] as $pren=>$prendas): ?>
            <tr><td class="probador">Probador <?=$pren?></td><td class="prendas"><?=$prendas?> </td>
            <td>
            <?php 
            if (isset($_SESSION['hora'][$pren])) { 
                echo $_SESSION['hora'][$pren];
            }
            ?>
            </td>
            <td>
                <form method='POST'>
                    <input type='hidden' name='pren' value=<?=$pren?>>
                    <button <?php if ($prendas==4) echo 'disabled' ?> class="boton" name="art" value="+"> + </button>
                    <button <?php if (!$prendas) echo 'disabled' ?> class="boton" name="art" value="-"> - </button>
                    <?php if ($prendas) : ?>
                        <button  class="boton" name="art" value="x"> Eliminar </button>
                    <?php endif; ?>
                </form>
            </td></tr>
        <?php endforeach; ?>

        </table>

            <form method='POST'>
                <button class="boton" name="art" value="v">Vaciar</button>
                <?php 
                echo " <button class='boton'><a href='logout.php'>Cerrar Sesión</a></button>";
                ?>
            </form>
            
	</body>
</html>