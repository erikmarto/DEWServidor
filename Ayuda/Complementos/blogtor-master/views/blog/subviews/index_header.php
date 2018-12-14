<?php
if(app::instance()->isLogged()) {
?>
    <h1 class="display-4">Descubre</h1>
    <p class="lead">nuevas ideas</p>
    <hr class="header-separator">
<?php
} else {
?>
        <h1 class="display-4">Descubre Blogster</h1>
        <p class="lead">lo último en blogs</p>
        <hr class="header-separator">
        <p class='lead signup-prompt'><a href='?r=user/signup'>Únete</a> o lee las últimas entradas:</p>
<?php
}
?>