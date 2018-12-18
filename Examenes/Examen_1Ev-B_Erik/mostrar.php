<?php
require "init.php";
$v=new viscalendario($calendario);
?>

<html>
	<head>
		<title>Agenda</title>
		<link rel="stylesheet" type="text/css" href="calendario.css" />
	</head>
	<body>
		<h2>Agenda</h2>
		<div class="nav-menu">
			<a href="index.php">Volver al calendario</a>
		</div>
		<?php
			$v->displayAnyo();
		?>
	</body>
</html>