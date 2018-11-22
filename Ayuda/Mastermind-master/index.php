<?php 
require_once('Mastermind.class.php');
session_start(); 
// starting session should protect against accidental reloads
// if first load or reset button has been clicked, clear out 
// and start anew.
if ( isset( $_POST['reset'] ) ) {
    session_unset();
    $_SESSION['game-type'] = $_POST['reset'];
    unset($_POST['reset']);
}
if ( isset( $_SESSION['reset'] ) ) {
    session_unset();
}
if ( !isset( $_SESSION['current_game'] ) ) {
    $_SESSION['current_turn'] = 0;
    if ( $_SESSION['game-type'] == 'dup' ) {
        $_SESSION['current_game'] = new Mastermind(true);
    } else {
        $_SESSION['current_game'] = new Mastermind;
    }
}
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Mastermind</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="mastermind.js"></script>
</head>

<body>

    <h1>Mastermind in PHP with AJAX</h1>

    <p>Computer will choose a sequence of 4 out of 6 colors. Use the new game buttons to choose whether to allow repeated colors; default is no repeats. Allowing repeats does not guarantee them. Player must guess the sequence in no more than 12 tries. Each guess will be scored: green smile for each exact match, yellow neutral face for each partial match (correct color in the incorrect spot), red frown for each non-match (color not in final sequence). You will not be told which face goes with which spot! With duplication allowed, score is best possible without doubling up: e.g., if answer has blue in third place and guess has blue in first and third places, those blues will be scored as non-match and full match, respectively.</p>

    <div id="game-wrapper">
        <!-- where the game will be loaded -->
        <div class="centered">Loading Mastermind&hellip; please wait.</div>
    </div> <!-- #game-wrapper -->

    <div class="new-game-wrapper">
        <div class="new-game-button">
            <form method="post">
                <button type="submit" name="reset" value="dup">New Game With Duplication</button>
            </form>
        </div>

        <div class="new-game-button">
            <form method="post">
                <button type="submit" name="reset" value="no-dup">New Game Without Duplication</button>
            </form>
        </div>
    </div> <!-- .new-game-wrapper -->

</body>
</html>