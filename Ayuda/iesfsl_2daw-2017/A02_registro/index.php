<?php
/* Registro de usuarios
 * Ejemplo de validación de datos de un formulario
 */

// Muestra el error de un campo si está definido. Utiliza la variable global $errores[]
function vererror($campo) {
    global $errores;
    if (isset($errores[$campo]))
        echo '<br><span class=error>' . $errores[$campo] . '</span>';
}

$errores = [];
if (isset($_POST['accion'])) { // Venimos del formulario
    $datos = $_POST['datos'];
    if (strlen($datos['nombre']) === 0) {
        $errores['nombre'] = "Nombre necesario";
    }
    if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "Email incorrecto";
    }
    if (strlen($datos['pass']) <= 6) {
        $errores['pass'] = "Contraseña muy corta";
    }
    if (!isset($datos['sexo'])) {
        $errores['sexo'] = "Dato requerido";
    }
    if (!is_numeric($datos['edad']) || $datos['edad'] < 1 || $datos['edad'] > 100) {
        $errores['edad'] = "Edad no válida";
    }
    if (!isset($_POST['condiciones'])) {
        $errores['condiciones'] = "Tiene que aceptar las condiciones";
    }
    if (!$errores) {
        echo '<h1>Usuario ' . $datos['nombre'] . ' registrado</h1>';
        // Aquí $datos es un array con los datos del usuario. Podríamos crear un registro en Base de datos

        foreach ($datos as $campo => $valor)
            echo '<li>' . $campo . ' = ' . $valor;
        die();
    }
} else {
    $datos = ['nombre' => '', 'email' => '', 'edad' => '', 'sexo' => '', 'telefono' => ''];
}
?>
<html>
    <head>
        <style>
            h2 {background:#dee;padding:5px}
            .error{color: red;display:block}
            label{display:block;margin-top:5px;color:blue}
            fieldset{margin:auto;width:500px;background:#ddd}
        </style>
    </head>
    <body>
        <h2>Registro de usuarios</h2>
        <fieldset><legend>Escribe tus datos</legend>
            <form method="post">

                <label>Nombre: </label>
                <input type="text"  name="datos[nombre]" value="<?= $datos['nombre'] ?>" size="40"/>
                <?php vererror('nombre'); ?>

                <label>Sexo: </label>
                Hombre <input type="radio"  name="datos[sexo]" value="H" <?= isset($datos['sexo']) && $datos['sexo'] == 'H' ? 'checked' : '' ?> />
                Mujer <input type="radio"  name="datos[sexo]" value="M" <?= isset($datos['sexo']) && $datos['sexo'] == 'M' ? 'checked' : '' ?> />
                <?php vererror('sexo'); ?>

                <label>Edad: </label>
                <input  name="datos[edad]" value="<?= $datos['edad'] ?>"  size="3" />
                <?php vererror('edad'); ?>

                <label>Email: </label>
                <input type="text"  name="datos[email]" value="<?= $datos['email'] ?>" size="40"/>
                <?php vererror('email'); ?>

                <label>Contraseña: </label>
                <input type="password"  name="datos[pass]" value="<?= $datos['pass'] ?>" />
                <?php vererror('pass'); ?>

                <p><i>Acepto las Condiciones:</i> <input type="checkbox"  name="condiciones"  />
                <?php vererror('condiciones'); ?>

                <p><input type="submit" name="accion" value="Enviar" /></p>
            </form>
        </fieldset>
    </body>
</html>
