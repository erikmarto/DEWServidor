<ul class="navbar-nav mr-auto">
<li class="nav-item">
        <a class="nav-link" href="?r=blog/index">Descubrir</a>
    </li>
</ul>
<ul class="nav navbar-nav navbar-right">
    
</ul>
<ul class="nav navbar-nav navbar-right">
    <li class="no-phone">
        <?php 
            require "views/layout-components/searchbar.php";
        ?>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle text-success" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
        <ul id="login-dp" class="dropdown-menu dropdown-menu-right">
            <li>
                <div class="row">
                    <div class="col-md-12 login-dropdown-top">
                        <p>Login</p>
                        <!--HOW TO MAKE IT SO IT SENDS DATA BOTH IN POST AND GET -->
                        <form class="form" role="form" method="post" action="?r=user/login" accept-charset="UTF-8" id="login-nav">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Nombre de usuario</label>
                                <input name="login[username]" type="text" class="form-control" id="exampleInputEmail2" placeholder="Nombre de usuario" required>
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
                    <div class="login-dropdown-bottom text-center">
                        New here ? <a href="?r=user/signup"><b>Join Us</b></a>
                    </div>
                </div>
            </li>
        </ul>
    </li>
</ul>