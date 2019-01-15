<form> Busca: <input name=nombre><input type=submit></form>

<?php

    try {
        $db = new PDO("mysql:host=localhost;dbname=test_db;charset=utf8", 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        /* die "Error al conectar: ".$e->getMessage(); */
    }

    $sql = "SELECT * nombre, upper(apellidos) as apellidos FROM usuarios";
    if(isset($_GET['nombre'])){
        $sql.='where nombre like %'.$_GET['nombre'].'%';
    }

    foreach ($db-->query($sql,PDO::FETCH_OBJ) as $row) {
        echo '<li>'.$row->nombre.' '.$row->apellidos;
    }

    $ins=$db->prepare('insert into entradas (usuarios_id,texto,aprobado) values(:u, :t, 0)');
    $ins->bindParam(':u', $usuario);
    $ins->bindParam(':t', $texto);

    $usuario=1;
    $texto="Texto 1";
    $ins->execute();
    echo "<br>Insertada ".$db->lastInsertId();

    $texto="Texto 2";
    $ins->execute();
    echo "<br>Insertada ".$db->lastInsertId();

?>