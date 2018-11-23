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

    <h1>Mastermind</h1>

    <div id="game-wrapper">
        <!-- where the game will be loaded -->
    </div> <!-- #game-wrapper -->

    <div class="new-game-wrapper">

        <div class="new-game-button">
            <form method="post">
                <button type="submit" name="reset" value="no-dup">New Game Without Duplication</button>
            </form>
        </div>
    </div> <!-- .new-game-wrapper -->

</body>
</html>