<html>
<head>
    <meta charset="utf-8" />
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container" >
        <h2>Registro de Usuario</h2>
        <form method="POST">
            <div class="row">
                <div class="col col-md-4">
                    <label for="nombre">Nombre </label>
                    <input type="text" id="nombre" class="form-control" name="nombre" value=<?=$u->nombre?>>
                    <?php varerror($u,'nombre')?>
                </div>
                <div class="col col-md-4">
                    <label for="email">Email </label>
                    <input id="email" class="form-control" name="email"  value=<?=$u->$email?>>
                    <?php varerror($u,'email')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-2 ">
                        <label for="sexo">Sexo </label>
                        <?php desplegable('sexo',$u->$sexo,usuario::sexooptions) ?>
                        <?php varerror($u,'sexo')?>
                </div>
                <div class="col col-md-1">
                    <label for="fecha_nac">Edad: </label>
                    <input type="date" id="fecha_nac" class="form-control" name="fecha_nac" value=<?=$u->$fecha_nac?>>
                    <?php varerror($u,'edad')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-8">
                    <label for="observ">Observaciones: </label>
                    <textarea  id="observ" class="form-control" rows="5" name="observaciones"><?=$u->$observaciones?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4 ">
                    <label for="password2">Contraseña: </label>
                    <input type="password" id="password" class="form-control" name="password" >
                    <?php varerror($u,'password')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4">
                    <input type="checkbox" id="condiciones"  name="condiciones" >
                    <label for="condiciones">
                    Acepto las Condiciones
                    </label>
                    <?php varerror($u,'condiciones')?>
                </div>
            </div>

            <div class="row">
                <div class="col col-md-2">
                    <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
                </div>
            </div>
        </form>
    </div>

</body>
</html>