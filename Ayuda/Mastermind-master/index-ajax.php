<?php
require_once('Mastermind.class.php');
session_start();

//respond to AJAX requests
echo doAction();

function doAction() {
    $new_guesses = array();
    // if we got here via guess form submission, wrangle the new
    // guess and increment the turn count.
    if ( isset( $_GET['spot-1'] ) ) {
        for( $i = 0 ; $i < 4 ; $i++ ) {
            $j = $i+1;
            $curr_spot = 'spot-' . $j;
            $new_guesses[$i] = $_GET[$curr_spot];
        }
        $_SESSION['current_turn']++;
    }
    // play a round!
    $_SESSION['current_game']->play_game( $new_guesses, $_SESSION['current_turn'] );
}
