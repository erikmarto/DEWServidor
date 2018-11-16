<?php
//Inicio de sesion para crear probadores
session_start();

if (isset($_POST['numprobadores'])) {
	$_SESSION['numprobadores'] = $_POST['numprobadores'];
	for ($j=1;$j<=$_POST['numprobadores'];$j++) {
		$_SESSION['probador'][$j]=0;
	}
	header('Location:probador.php');
}
?>

<html>
	<head>
		<title>Examen Probadores</title>
	</head>
	<body>
		<h2>Control de Probadores</h2>
		<form method = "POST"> 
			Número de probadores: 
			<input name = "numprobadores" size = "2">
			<input type = "submit" value = "Enviar">
		</form>
	</body>
</html>
