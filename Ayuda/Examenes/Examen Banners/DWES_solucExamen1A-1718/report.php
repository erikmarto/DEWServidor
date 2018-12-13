<?php
// Informe del log de clics
require 'banner.php';
cargabanners();

$totales=array_fill(0,count($banners),0);

foreach(file('log.txt') as $linea){
    list($b,$fecha)=explode(',',$linea);
    $totales[$b]++;
}
?>
<html><body><h3>Clics totales</h3>
<table><tr><th>Banner</td><th>Clics</td></tr>
<?php    
foreach($banners as $b=>$banner){
    echo '<tr><td>'.$banner[1]. '</td><td align=right>'.$totales[$b].'</td></tr>';
}
?>
</table>
</body>
</html>
