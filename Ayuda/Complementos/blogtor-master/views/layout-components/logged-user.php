<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="?r=blog/userblog">Tu blog</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="?r=blog/index">Descubrir</a>
    </li> 
    <?php
    if (app::instance()->getuser()->isAdmin()) {
        echo    '<li>
                    <a class="nav-link" href="?r=admin">Admin panel</a>
                </li>';
    }
    ?>
</ul>

<!--
<form role="form">
    <div class="row">
        <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-search"></span>
            <select class="input-group-addon selectpicker">
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
            </select>
            <input Placeholder="Search Food" type="text" class="form-control input-lg hasclear">
            <span class="clearer input-group-addon glyphicon glyphicon-remove-circle"></span>
        </div>
    </div>
</form>
-->

<ul class="nav navbar-nav navbar-right">
    <li id="create-entrada" class="nav-item">
        <a href="?r=blog/create" class="btn btn-success">Nueva entrada</a>
    </li>
    <li class="no-phone">
        <?php 
            require "views/layout-components/searchbar.php";
        ?>
    </li>
</ul>
<ul  class="nav navbar-nav navbar-right">
    <li class="nav-item no-phone">
        <div class="avatar-small">
            <div id="avatarImg" style="background-image: url(<?=app::instance()->getUser()->profile_pic_path?>)"></div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
            <!--<img id="profile-picture" src="<?=app::instance()->getUser()->profile_pic_path?>" class="rounded-circle img-fluid"> -->
            
            <?=app::instance()->getUser()->usuario?>
        </a>
        <div class="dropdown-menu bg-green dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="?r=user/inbox">Bandeja entrada</a>
            <a class="dropdown-item" href="?r=user/config">Configuración</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?r=user/logout">Sign out</a>
        </div>
    </li>
</ul>


<!--

    -->
