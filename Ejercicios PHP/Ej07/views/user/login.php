<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content"> 
    <h1 class="display-4">Login</h1>
    <p class="lead">to Blogster</p>
    <hr class="header-separator">
    <form class="form" role="form" method="post" action="?r=user/login" accept-charset="UTF-8" id="login-nav">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Nombre de usuario</label>
            <input name="login[username]" type="text" class="form-control" id="exampleInputEmail2" placeholder="Nombre de usuario" <?=isset($usuario->usuario)?"value='".$usuario->usuario."'":''?> required>
        </div>
        <div class="form-group">
            <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
            <input name="login[password]" type="password" class="form-control" id="exampleInputPassword2" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </div>
    </form>
</div>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>