<?php
require 'init.php';
if(!isset($_GET['fichero']))
    header('Location:verfotos.php');

$imagen=$_GET['fichero'];
$src = "$fotos/$imagen";

//Venimos de confirmar
if(isset($_POST['confirma'])) {
        extract($_POST);// Define $x=$_POST['x'], $y=$_POST['y']....

        $ext=pathinfo($src,PATHINFO_EXTENSION);
        if($ext=='jpg' || $ext=='jpeg')
            $orig = imagecreatefromjpeg($src);
        elseif($ext=='png') {
            $orig = imagecreatefrompng($src);
        } else
            die("No se puede editar la imagen");
	$dest = ImageCreateTrueColor( $w, $h );

	imagecopyresampled($dest,$orig,0,0,$x,$y,$w,$h,$w,$h);
        if($ext=='jpg' || $ext=='jpeg')
            $ret=imagejpeg($dest,$src,90); //Calidad 90%
        else
            $ret=imagepng($dest,$src,3); //Compresión 3
        if(!$ret) die("Error al guardar");
        header('Location:editar.php?fichero='.$imagen);
}

//Forzamos recarga de imagen después de recortar
session_cache_limiter('nocache');
require 'header.php';

$cara=buscarcara($src);
// Devuelve ['x'=>99,'y'=>8,'w'=>77]
if($cara) {
    extract($cara); //Define $x=$cara['x']..,$y y $w
    $setselect=sprintf(',setSelect: [%d,%d,%d,%d]',$x,$y,$x+$w,$y+$w);
            
} else {
    $setselect='';
}
?>
<script src="lib/jcrop/js/jquery.min.js"></script>
<script src="lib/jcrop/js/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="lib/jcrop/css/jquery.Jcrop.css" type="text/css" />
 

<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      //aspectRatio: 4/3,
      boxHeight:400,
      onSelect: actualizaCoords
      <?= $setselect ?>
    });

  });

  function actualizaCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Selecciona una región antes de confirmar.');
    return false;
  };

</script>

<hr>
<div class=foto>
        <img id=cropbox src='<?= "$fotos/$imagen?".date('U') ?>' >
</div><div style="clear:left"></div>
<form method="post" onsubmit="return checkCoords();">
        <input type="hidden" id="x" name="x" />
        Alto: <input type="text" readonly size=3 id="y" name="y" />
        Ancho: <input type="text" readonly size=3 id="w" name="w" />
        <input type="hidden" id="h" name="h" />
        <button type=submit name='confirma' class='btn btn-primary'><i class='fa fa-pencil'> Recortar</i></button>
        
</form>

</form>
</body>
</html>

