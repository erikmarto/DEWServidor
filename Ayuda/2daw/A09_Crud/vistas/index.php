<a href="alta.php" class='btn btn-primary btn-sm'>Crear</a><p>
<table class='table-bordered table-hover'><tr><th>Usuario</th><th>Email</th><th>Estado</th><th>Acción</th></tr>        
<?php
$n=0;
while($usuario= mysqli_fetch_object($query,'Usuario')) {
    $n++;
    echo "<tr>
    <td>$usuario->nombre</td>
    <td>$usuario->email</td>
    <td>".$usuario->getestadotext()."</td>
    <td>    
    <form method=post action='borra.php'>
       <a href='modifica.php?id=$usuario->id' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
        <input type=hidden name=id value=$usuario->id>
        <button class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>   
    </form>
    </tr>";
}
?>
</table>
<?= $start.'/'.($start+$n-1) ?>&nbsp;
<a href='?page=<?= $page==1 ? 1: $page-1?>' class='btn btn-success'> &lt;&lt; </a>
<a href='?page=<?= $page+1?>' class='btn btn-success'> &gt;&gt; </a>

        