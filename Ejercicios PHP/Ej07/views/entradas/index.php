<h3 class="text-center">Aqui podras añadir entradas.</h3>

<?php 


foreach(entradas::findAll() as $row){

//foreach($db->query($sql,PDO::FETCH_OBJ) as $row){
    echo '<div class="entradas">';
    echo '<div>'.$row->id.'</div>';
    echo '<p>'.$row->texto.'</p>';
    echo "<div><a href='?r=Entrada/view'>Comentarios</a></div>";
    echo '</div><br>';
    echo Mhtml::actionlink('Entrada/view',$t->entrada,['id'=>$t->id]);
}

?>