<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
    <div class="header">
    <span><a href='.'><?php echo app::instance()->name ?></a></span>
    <div class="header-left">

    </div>
    <div class="header-right">
        <?php
    if(app::instance()->isLogued()){
        //echo app::instance()->user->id;
        echo '<a href="?r=usuario/view">Perfil</a>';
        echo "<a href='?r=site/logout'>Logout</a>";
    } else{
        echo '<a href="#contact">Register</a>';
        echo "<a href='?r=site/login'>Login</a>";
    }
    ?>
    </div>
    </div>
    <hr>
    <h2><?=$this->title?></h2>
    <div class="contenido">

    <?php
    echo $content;
    ?>

    </div><br>
    <hr style='clear:left'>
    Copyright (2016) Desarrollado con microframework mfp:<a href="mfp/docum/">Documentación</a>
</body>
</html>

<!--

// FETCH_OBJ
$stmt = $dbh->prepare("SELECT * FROM entradas");
// Ejecutamos
$stmt->execute();
// Ahora vamos a indicar el fetch mode cuando llamamos a fetch:

echo "<div id='tabla_entrada'><table><tr><th class='th_id'>ID</th><th>TEXTO</th><th>FECHA</th></tr>";
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    echo "<tr>";
    echo "<td><div class='id_blog'>".$row->id."</div> </td>";
    echo "<td><div class='text_blog'>".substr($row->texto,0,50)."... <br><a href='rommelhueleacaca.php'> Ver comentarios</a></div></td>";
    echo "<td><div class='fecha_blog'>".$row->fecha_hora."</div></td>";
    echo "</tr>";
}
echo "</div>";

-->
