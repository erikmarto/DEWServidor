
<form> Busca: <input name=nombre><input type=submit></form>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";

    // Create connection
    $db = mysqli_connect($servername, $username, $password) or die("Connection failed: ".mysqli_connect_error());

    mysqli_select_db($db,'test_db') or die('Error en BD tes_dbs');
    mysqli_set_charset($db, "utf8");

    if(isset($_GET['nombre']))
        $buscar='%'.$_GET['nombre'].'%';
    else
        $buscar='%';

    $sql = "SELECT * nombre, upper(apellidos) as apellidos FROM usuarios where nombre like '$buscar'";
    echo "La consulta es $sql";
    $result = mysqli_query($db, $sql);
    if(!$result) die('Error en la sql');

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '<li>'.$row['nombre'].' '.$row['apellidos'];
        }
    } else {
        echo "0 results";
    }

    $usuario=1;
    $texto="Mi primer texto desde php";

    $sql=sprintf('insert into entradas (usuarios_id,texto,aprobado) values(%d,"%s",0)'.$usuario,$texto);
    echo $sql;
    $res = mysqli_query($db, $sql);
    if(!$res) die("Error al insertar: ".mysqli_connect_error($db));
    echo "Insertada entrada con el código ".mysqli_insert_id($db);
?>