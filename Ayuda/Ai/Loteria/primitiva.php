
 <pre>
<?php

$boletos=file('boletos.txt');
$boletosep=[]; $numerosep=[]; $resultado=['2','4','6','40','23','32'];

foreach ($boletos as $bolsepar){
    $boletosep[]=explode('=',$bolsepar);
}

foreach ($boletosep as $numsepar){
    $numerosep[$numsepar[0]]=explode(',',trim($numsepar[1]));
}


if (isset($resultado)){
    foreach ($numerosep as $numbol => $numeritos){
        $cont=0;
        //$numeritos = $boletosep[$numbol];
        foreach ($resultado as $numlot){
            if(in_array($numlot,$numeritos)){
                $cont++;
            }
        }
    echo $cont."<br>";
    }
    
}
var_dump($numeritos);

?>