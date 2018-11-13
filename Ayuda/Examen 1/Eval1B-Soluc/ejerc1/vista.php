<html>
<head>
	<style>
		span{font-face:Verdana}
		.contador{font-size:2em;width:100%;background:#eed}
		input{font-size:2em}
		.bola{float:left;font-size:2.2em;text-align:center;margin:7px;padding:7px;border-radius:50%;
			background-color:#ddd;width:40px;height:40px}
		.salida{font-weight:bold; background-color:yellow}

	</style>
</head>
<body>
	<div class=contador>Bolas Jugadas: <?= count($bolas) ?></div>
<?php

//Pinta tablero
for($b=1;$b<=90;$b++){
	if($b%10===1) echo '<div style="clear:left"></div>';
	if(isset($bolas[$b]))
		$class='salida';
		else {
			$class='';
		}
	echo "<div class='bola $class'>$b</div>";
}


?>
<div style="clear:left"></div>
<form method="post">
	<input type="text" name="bola" size="2" >
	<input type="submit" name="acc" value="Marcar">
	<input type="submit" name="acc" value="Deshacer">
	<input type="submit" name="acc" value="Empezar">

</form>

</body>
</html>
