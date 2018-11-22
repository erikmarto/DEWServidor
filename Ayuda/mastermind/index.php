<?php include('resources/control.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

	<title>Mastermind Game</title>

	<link rel="stylesheet" type="text/css" href="resources/mastermind.css" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="resources/print.css" media="print" />

</head>

<body>



	<h1>
		Mastermind Game
	</h1>
	

	
	<div id="game">

		<a name="game"></a>

		<?php include('resources/game.php'); ?>
		
	</div>





	<div id="next">

		<a name="next"></a>
		
		<form method="post" id="next-attempt" action="index.php">

			<fieldset>

				<?php include('resources/form.php'); ?>

			</fieldset>
			
		</form>

	</div>



	<p class="goTo">
		<a href="/site/resources/games/mastermind/">Back to the games section</a> | 
		<a href="help.php?task=<?php echo($task); ?>">How to play</a> 
	</p>

</body>
</html>

