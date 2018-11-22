<?php





//check for victory by counting blacks
$blackScore = 0;
	



//score attempt function
function scoreThisAttempt()
{
	global $legend, $blackScore;
	
	
	//if post data attempt is there
	if(isset($_POST['attempt']))
	{
		//get input attempt, trimmed of whitespace
		$attempt = trim($_POST['attempt']);
	}
	//otherwise
	else 
	{
		//set an empty (hence invalid) string
		$attempt = '';
	}
	
	//get round number
	$round = $_SESSION['round'];
	
	//show the table flag
	$showTable = false;
	
	
	
	
	//if quit variable is present
	if(isset($_POST['quit']))
	{
		//quit message //add spaces to number for better reader intonation
		addMessage('Give up? Oh well ... the number was ' . implode(' ', $_SESSION['target']) . '.');
			
		//if this isn't the first round
		if($round > 1)
		{
			//show the table
			$showTable = true;
		}
	}
	
	
	
	//otherwise if number is valid input 
	//and it's either the first round, or not the same as the previous input
	//this protects against repeat input due to pressing refresh .. as well as stupidity :)
	else if(ereg('^[0-' . $_SESSION['difficulty'] . ']{4}$',$attempt) && ($round == 1 || $attempt != $_SESSION['attempts'][($round-1)]))
	{
		//add this attempt to array
		$_SESSION['attempts'][$round] = $attempt;
		
		//create new score for this attempt array
		$_SESSION['scores'][$round] = array('black' => 0, 'white' => 0);
	
		//remember which digits and attempt characters have been marked
		$digitsMarked = array(0,0,0,0);
		$charsMarked = array(0,0,0,0);
				
		//for each digit in the target number
		foreach($_SESSION['target'] as $key => $digit)
		{
			//if this digit matches the same digit in the attempt
			if($digit == substr($attempt, $key, 1))
			{
				//add one to black score
				$_SESSION['scores'][$round]['black']++;
	
				//remember this digit has been marked
				$digitsMarked[$key] = 1;
	
				//remember this character has been marked
				$charsMarked[$key] = 1;
				
				//add to black score
				$blackScore ++;
			}
			
		}	
			
		//now loop again
		//we have to do it this way rather than if/else
		//so that all characters have a chance 
		//to be marked black before being assessed for white
		//otherwise you could score a white 
		//for a character which is later marked black
		foreach($_SESSION['target'] as $key => $digit)
		{
			//for each character in the attempt string
			for($i=0; $i<strlen($attempt); $i++)
			{
				//if this character matches the digit
				if(substr($attempt, $i, 1) == $digit)
				{
					//if this digit and this character have not already been marked
					if(!$charsMarked[$i] && !$digitsMarked[$key])
					{
						//add one to white score
						$_SESSION['scores'][$round]['white']++;
						
						//remember this digit has been marked
						$digitsMarked[$key] = 1;
						
						//remember this character has been marked
						$charsMarked[$i] = 1;
						
						//break to stop repeats being counted again
						break;
					}
				}
			}
		}
		
		//show the table
		$showTable = true;
		
		//create form legend
		$legend = 'Round ' . ($round + 1) . ': Your next attempt';
			
		//increment round number
		$_SESSION['round']++;
	}
	
	
	//else number is not valid input and a target is set
	else if(isset($_SESSION['target']))
	{
		
		//if this isn't discounted with get value
		if(!isset($_GET['count']))
		{
			//if input was not a valid number
			if(!ereg('^[0-' . $_SESSION['difficulty'] . ']{4}$',$attempt))
			{
				//invalid input message
				addMessage('That was not a valid attempt - please enter four digits between 0 and ' . $_SESSION['difficulty'] . '.');
			}
			
			//else if it was the same as last time
			else if($attempt == $_SESSION['attempts'][($round-1)])
			{
				//say so
				addMessage('That\'s what you entered last time - please try a different number.');
			}
			
		}
		
		//create form legend
		$legend = 'Round ' . ($round) . ': Your next attempt';
			
		//if this isn't the first round
		if($round > 1)
		{
			//show the table
			$showTable = true;
		}
	}
	
	
	//if you won
	if($blackScore == 4)
	{
		//victory message //add spaces to number for better reader intonation
		addMessage('Fantastic! ' . implode(' ', $_SESSION['target']). ' is the right number, and you got there in ' . $round . ' attempt' . (($round > 1) ? 's' : '') . '.');
		addMessage('<img src=\'resources/trophy.gif\' id=\'trophy\' width=\'128\' height=\'128\' alt=\'Congratulations!\' title=\'Congratulations!\' />');
	
		//unset target value so that if you press refresh from here 
		//it can recognise that and put up a new game form
		//instead of an invalid input / new round form
		unset($_SESSION['target']);
	}
	

	//if we're showing the table
	if($showTable)
	{
	
		//number of previous attempts
		$last = count($_SESSION['attempts']);
	
		//start compiling last attempt table
		$html = ""
			. "<table cellpadding='0' cellspacing='1' border='1' summary='This table charts your last attempt'>\n\n"
			. "\t\t\t<caption>Your last attempt:</caption>\n\n";			
		
		//add headers
		$html .= addTableHeaders();
		
		//add a table row for the last attempt
		$html .= addTableRow($last,$_SESSION['attempts'][$last]);
		
		//finish compiling last attempt table
		$html .= "\t\t\t</tbody>\n\n"
		. "\t\t</table>\n\n";
		
		//if there's more than one previous attempt
		if($last > 1)
		{
	
			//jump to next attempt link
			$html .= "<p class='nextAttempt'><a href='#next-attempt' title='Jump to next attempt form'>Next attempt</a></p>\n\n";
	
			//start compiling previous attempts table
			$html .= ""
				. "<table cellpadding='0' cellspacing='1' border='1' summary='This table charts all your previous attempts'>\n\n"
				. "\t\t\t<caption>All your previous attempts (in reverse order):</caption>\n\n";			
			
			//add headers
			$html .= addTableHeaders();
			
			//for each attempt in the array, in reverse order
			for($i=$last; $i>0; $i--)
			{
				//add a table row
				$html .= addTableRow($i,$_SESSION['attempts'][$i]);
			}
				
			//finish compiling previous attempts table
			$html .= "\t\t\t</tbody>\n\n"
			. "\t\t</table>\n\n";
		
		}
		
		//print table
		echo($html);
	
	}

}



//add headers to score table
function addTableHeaders()
{
	$html = ""
	. "\t\t\t<thead>\n"
		. "\t\t\t\t<tr>\n"
		. "\t\t\t\t\t<th scope='col'>Round.</th>\n"
		. "\t\t\t\t\t<th scope='col'>Number.</th>\n"
		. "\t\t\t\t\t<th scope='col'>Mark</th>\n"
		. "\t\t\t\t</tr>\n"
	. "\t\t\t</thead>\n\n"
	. "\t\t\t<tbody>\n\n";
	
	return $html;
}


//add row to score table
function addTableRow($key,$data)
{
	//track total score
	$total = 0;
	
	//open table row //add spaces to number for better reader intonation
	$html = ""
	. "\t\t\t\t<tr>\n"
		. "\t\t\t\t\t<td scope='row'><span class='offleft'>Round </span>" . $key . ".</td>\n"
		. "\t\t\t\t\t<td>" . ereg_replace("([0-9])","\\1 ",$data) . "</td>\n"
		. "\t\t\t\t\t<td>";
	
	//add black scores for this row
	for($j=0; $j<$_SESSION['scores'][$key]['black']; $j++)
	{
		$html .= "<img src='resources/black.gif' class='mark black' alt='Black ' title='Black: the right number in the right place' />";
		
		//increase total
		$total++;
	}
	
	//add white scores for this row
	for($j=0; $j<$_SESSION['scores'][$key]['white']; $j++)
	{
		$html .= "<img src='resources/white.gif' class='mark white' alt='White ' title='White: the right number but in the wrong place' />";
		
		//increase total
		$total++;
	}

	//if total score is zero
	if($total == 0)
	{
		//add "no score" message
		$html .= 'No score';
	}

	//close table row
	$html .= "</td>\n"
	. "\t\t\t\t</tr>\n";

	return $html;
}



//echo message to page
function addMessage($text)
{
	echo("<p id='message'>$text</p>\n");
}





//process by task
switch($task)
{
	
	//new game
	case 'new' : 

		//first round number
		$_SESSION['round'] = 1;

		//set difficulty level if post data is there
		if(isset($_POST['difficulty']))
		{
			$_SESSION['difficulty'] = $_POST['difficulty'];
		}
		$diff = $_SESSION['difficulty'];
		
		//target number
		$_SESSION['target'] = array(rand(1,$diff),rand(1,$diff),rand(1,$diff),rand(1,$diff));
		
		//attempts
		$_SESSION['attempts'] = array();
	
		//scores for attempts
		$_SESSION['scores'] = array();
	
		//number chosen message
		addMessage('A number has been chosen ...');
		
		//form legend
		$legend = 'Round 1: Your first attempt';
		
		break;
		
	//score attempt
	case 'score' :
	
		//score this attempt
		scoreThisAttempt();

		break;

}
	



?>