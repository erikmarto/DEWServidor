<html>
<head><TITLE>Títulos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<meta http-equiv="Cache-Control" content="no-store" />

	<link rel="stylesheet"   type="text/css" href="views/estilo.css">
        <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      
    </head>        
</head>
<body>
    <div class='logo'><a href=index.php>Libros</a> 
	<span style='float:right;font-size:0.4em'>
                    <a href="leeme.html">Ayuda</a>
            <?php
            if(ensesion()){
                    echo $_SESSION['usuario']['nombre'];
                    echo ' <a href=user.php?a=logout>[Salir]</a>';
            } else {
                    ?><form method='post' action='user.php?a=login' autocomplete="off">
                            Usuario:<input name='usuario' size='10' > 
                            Password:<input type='password' name='password' size='10'>
                            <input type='submit' value='Entrar'>	
                    </form>
                    <?php
            }

            ?>
	</span>
    </div><br>
    <div class='contenido'>
    <?=getflash();?>
        <?php
        require 'views/'.$vista.'.php';
        ?>
    </div>
<hr>
<a href='leeme.html'>LEEME</a>
</body>
</html>
