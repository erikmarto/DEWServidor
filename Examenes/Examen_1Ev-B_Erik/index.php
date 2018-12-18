<?php
require 'init.php';

if(isset($_GET['mes'])) {
	$mes=$_GET['mes'];
	switch ($mes) {
		case 1:
		break;
		case 13:
		break;
	}
}
else {
	$mes=date('m');
}

$v=new viscalendario($calendario);
?>

<html>
	<head>
		<title>Agenda</title>
		<link rel="stylesheet" type="text/css" href="calendario.css" />
	</head>
	<body>
		<h2>Agenda</h2>
		<div class="nav-completo">
			<a href="mostrar.php">Resumen del año</a>
			<div class="meses">
				<?=$mes==1?'':"<a href='?mes=".($mes-1)."'>Mes Anterior</a>"?>
				<?=$mes==12?'':"<a href='?mes=".($mes+1)."'>Mes Siguiente</a>"?>
			</div>
		</div>
		<div class=mesgrande>
		<?php
			$v->displaymes($mes);
		?>
		</div>
	</body>
</html>

