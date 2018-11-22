<?php
		
//output code 
$html = '';

//if no task is set, or black score is 4 print 
//or quit variable is present, or no target is set
if($task == '' || $blackScore == 4 || isset($_POST['quit']) || !isset($_SESSION['target']))
{

//print a new game form
$html = <<<endh

	
				<legend>Start a new game</legend>
	
				<label for="difficulty">Difficulty</label>				
				<select id="difficulty" name="difficulty">
					<option value="5">Normal (use 1 to 5)</option>
					<option value="9">Hard (use 1 to 9)</option>
				</select>
				
				<input type="submit" class="submit" value="New game" />
	
				<input type="hidden" name="task" value="new" />


endh;

}

//otherwise print attempt form
else
{
		
	$html = ""
		
	."<legend>$legend</legend>\n\n"
	
	."\t\t\t\t<label for='attempt'>Number:</label>\n"
	
	."\t\t\t\t<input type='text' id='attempt' name='attempt' value='' maxlength='4' />\n\n"

	."\t\t\t\t<input type='submit' class='submit' value='Mark number' />\n\n"
	."\t\t\t\t<input type='submit' class='submit' name='quit' value='I give up' />\n\n"

	."\t\t\t\t<input type='hidden' id='task' name='task' value='score' />\n";


}

//print output code
echo($html);
		


?>