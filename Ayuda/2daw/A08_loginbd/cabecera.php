<html>
    <header>
        <style>
            a {padding:4px;background: #00e;color:white;text-decoration: none}
        </style>
            
    </header>
    <body>
        <h2>Mi Amazon</h2>
        <?php
            if(usuario()) { // Estamos logueados
                echo "Usuario: ".usuario();
                echo ' <a href=logout.php>Salir</a>';
                echo ' <a href=miperfil.php>Mi Perfil</a>';
            } else
                echo "<a href=login.php>Login</a>";
        ?>
<hr>