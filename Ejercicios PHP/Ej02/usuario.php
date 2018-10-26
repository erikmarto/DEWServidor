<!--Formulario de registro de usuarios
Desarrolla un script PHP de alta de usuarios en una web, que solicite:
nombre de usuario
Edad
email
Sexo
Observaciones
Contraseña deseada (campo tipo password)
Un checkbox de "Acepto las condiciones ....."
Al enviar los datos se validan, y si son correctos se muestra el mensaje "Datos correctos. Usuario dado de alta". 
Si no lo son, se muestra de nuevo el formulario con los valores introducidos para corregirlos y los mensajes de error. 
Las validaciones a hacer son:
El nombre de usuario es requerido
La edad es numérica entre 1 y 100
La contraseña ha de tener al menos 6 caracteres 
El email ha de ser correcto (vale con comprobar que lleva una @)
Se ha marcado la casilla de aceptación de condiciones-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ej02</title>
</head>
<?php
require "registro_usuario.php";
?>
<body>
    <h1><u>Registro de Usuario</u></h1>

    <form method="POST">
        <p>Escriba su nombre: <input type="text" name="nombre" value="<?=$nombre?>" /></p>
        <?= varerror($error, 'nombre'); ?>
        <p>Escriba su edad: <input type="number" name="edad" min="1" max="100" value="<?=$edad?>"  /></p>
        <?= varerror($error, 'edad'); ?>
        <p>Escriba su email: <input type="text" name="correo" value="<?=$correo?>" /></p>
        <?= varerror($error, 'correo'); ?>
        <p>Elija su sexo: <input type="radio" name="genero" value="mujer" />Mujer <input type="radio" name="genero" value="hombre" />Hombre</p>
        <?= varerror($error, 'genero'); ?>
        <p>Escriba sus observaciones:<br><textarea type="text" name="observaciones"></textarea></p>
        <p>Escriba su contraseña: <input type="password" name="contraseña" min="6" value="<?=$cont?>" /></p>
        <?= varerror($error, 'contraseña'); ?>
        <p>Acepte las condiciones: <input type="checkbox" name="condiciones" value="<?=$cond?>" /></p>
        <?= varerror($error, 'condiciones'); ?>

        <p><input type="submit" name="envio" value="Enviar" />
        <input type="reset" name="Borrar" value="Borrar" /></p>
    </form>

</body>
</html>