<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    <h1 class="display-4">Registro</h1>
    <p class="lead">de usuarios</p>
    <hr class="header-separator">
    <h2 class="text-center">Registro de Usuario</h2>
    <form method="POST" action="?r=user/signup">
        <div class="form-container">

                <div class="form-group">
                    <label for="nameInput">Nombre: </label>
                    <input type="text" id="nameInput" class="form-control" name="usuario[nombre]" placeholder="Introduce tu nombre" value=<?=$usuario->nombre?>>
                    <?=vererror($usuario, 'nombre')?>
                </div>

                <div class="form-group">
                    <label for="userInput">Nombre de usuario: </label>
                    <input type="text" id="userInput" class="form-control" name="usuario[usuario]" placeholder="Introduce tu nombre de usuario" value=<?=$usuario->usuario?>>
                    <?=vererror($usuario, 'nombre')?>
                </div>

                <div class="form-group">
                    <label for="emailInput">Email: </label>
                    <input type="email" id="emailInput" class="form-control" name="usuario[email]" placeholder="Introduce tu email" value=<?=$usuario->email?>>
                    <?=vererror($usuario, 'email')?>
                </div>

                <div class="form-group">
                    <label for="pwInput">Contraseña: </label>
                    <div class="input-group">
                        <input type="password" id="pwInput" class="form-control" name="usuario[password]" placeholder="Contraseña">
                        <input type="password" id="pwInput2" class="form-control" name="password2" placeholder="Repita contraseña" >
                    
                    </div>
                    <?=vererror($usuario, 'password')?>
                </div>

                <div class="col-2 form-group">
                    <input type="submit" class="btn btn-dark" name="envio" value="Enviar">
                </div>
        </div>
    </form>
</div>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>