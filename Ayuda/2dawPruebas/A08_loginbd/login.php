<?php
require 'init.php';

if(usuario())
    header('Location:index.php');

if(isset($_POST['entrar'])) {
    try {
        login($_POST['usuario'],$_POST['pass']);
        header('Location:index.php');
    } catch (Exception $e) {
        $error=$e->getMessage();
    }
} else
    $error='';

?>
<html><body><h2>Mi Amazon</h2>
        <fieldset style='margin:auto;width:300px'>
        <legend>Login</legend>
        <form method="post">Usuario: <input name="usuario"><br>
            Contraseña: <input type="password" name="pass">
                    <?php if($error) echo "<div>$error</div>"; ?>
            <br>
            <input type="submit" name="entrar" value="Entrar">
        </form>
        </fieldset>
    </body>
</html>

