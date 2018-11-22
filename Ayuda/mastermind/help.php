<?php include('resources/control.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

	<title>Mastermind Game</title>

	<link rel="stylesheet" type="text/css" href="resources/mastermind.css" media="screen,projection" />

</head>

<body>



	<h1>
		Mastermind Game
	</h1>
	
	

	<div id="instructions">

		<h2>How to play</h2>
		
		<p>
			Mastermind is a game of logical deduction. 
			The computer will think of a four-digit number, and 
			you have to work out what it is. 
		</p>
		
		<p>
			Start by making a guess. 
			Each of the digits in the number you guess will 
			be marked <strong>BLACK</strong> 
			or <strong>WHITE</strong>.  
			<strong>BLACK</strong> means the right digit in the right place; 
			<strong>WHITE</strong> means the right digit but in the wrong place.
		</p>
		
		<p>
			So for example: if the number was "1 4 2 5" and you guessed 
			"2 4 3 3", you would score a single black  
			and a single white - a black  
			for the "4" in the right place, and a white for the "2" 
			in the wrong place. When you get it exactly right 
			you'll score four blacks, and the game is over.
		</p>
		
		<p>
			The overall objective is to get it 
			in the fewest attempts.
		</p>
		
	</div>






	<p class="goTo">
		<a href="index.php?task=<?php echo($task); ?>&amp;count=no">Back to the game</a> 
	</p>

</body>
</html>

