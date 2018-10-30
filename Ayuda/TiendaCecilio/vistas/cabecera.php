<html>
    <header>
        <title>Tienda ONLINE</title>
        <link rel="stylesheet" type="text/css" href="vistas/estilo.css" media="screen" />
    </header>

    <body>
        <h2 style='width:80%;float:left'><a href="index.php" class='titulo'>Mi Tienda ONLINE</a></h2>
        <?php
        if (isset($_SESSION['carrito']))
            echo "<a href='carrito.php'><img src=imagenes/carrito.jpg width=40px></a>";
        ?>

        <hr style='clear:left'>
        <div style='margin:auto;width:900px'>
