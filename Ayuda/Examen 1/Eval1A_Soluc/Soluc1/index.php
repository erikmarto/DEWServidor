<?php
session_start();
if(isset($_POST['numprobadores'])){
	$_SESSION['numprobadores']=$_POST['numprobadores'];
	for($i=1;$i<=$_POST['numprobadores'];$i++)
        $_SESSION['probador'][$i]=0;
	header('Location:probador.php');
}
?>
<html>
<body>
<h2>Control de Probadores</h2>
	<form method=post>
		Número de probadores:
		<input name=numprobadores size=2>
		<input type=submit value=Enviar>
	</form>
</body>
</html>
