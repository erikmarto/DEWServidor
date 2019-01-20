<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/mainEstilo.css">
    <link rel="stylesheet" type="text/css" href="css/estiloComentarios.css">
</head>
<body>
    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="."><h2 id="titulo">Primer-Blog</h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <?php
                        //mostrar boton 'MiBlog y Añadir Entrada' según esté logueado o no
                        if(app::instance()->isLogued()){ ?>
                            <li class="nav-item">
                                <?php echo Mhtml::actionlink('Entrada/index',"Añadir Entrada", [], "button"); ?>
                            </li>&emsp;
                            <li class="nav-item">
                                <?php echo Mhtml::actionlink('usuarios/index',"Configuración", [], "button"); ?>
                            </li>
                    <?php }?>  
                </ul>
                <!-- login / user menu -->
                <?php
                    //mostrar login o usuario según esté logueado o no
                    if(app::instance()->isLogued()){
                        require "usuarios/logged-user.php";
                        echo "<a id='logOut' href='?r=usuarios/logout'>(Salir)</a>";
                    } else {
                        echo Mhtml::actionlink('usuarios/signup',"Registrarse");
                        echo '&emsp;&ensp;';
                        echo '<span id="btnLogin">';
                        echo Mhtml::actionlink('usuarios/login',"Login");
                        echo '</span>';
                    }
                ?>
            </div>
        </nav>
    </div>

    
    <!-- CONTENT -->
    <div id="main-content" class="col-12 offset-md-1 col-md-10 offset-xl-2 col-xl-8 bg-blue contentBlog">
        <!--<h1><?=$this->title?></h1>-->
        <?=$content?>
    </div>