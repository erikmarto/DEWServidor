<?php
class Mastermind {
    protected $sequence = array();
    protected $guesses = array();
    protected $evaluations = array();
    public $duplication;
    
    function __construct( $duplication=false ) {
        // creates the secret sequence
        // with or without duplicate colors permitted
        $this->duplication = $duplication;
        $possibilities = array('red', 'orange', 'yellow', 'green', 'blue', 'purple');
        if ( $duplication ) {
            $possibilities = array( 'red', 'orange', 'yellow', 'green', 'blue', 'purple', 'red', 'orange', 'yellow', 'green', 'blue', 'purple', 'red', 'orange', 'yellow', 'green', 'blue', 'purple', 'red', 'orange', 'yellow', 'green', 'blue', 'purple' );
        }
        shuffle($possibilities);
        for ( $i = 0 ; $i < 4 ; $i++ ) {
            $this->sequence[$i] = array_pop($possibilities);
        }
    }
    
    // Grades newest guess, determines whether player has won or lost
    // and takes care of printing win/loss messages, the game board, 
    // and the guess form if appropriate.
    /******
    * NOTE: $turn is the turn the player will take by submitting the 
    * guess form. The most recent guess will be $turn-1.
    ******/
    public function play_game($new_guess, $turn) {
        //if no new guess, print board and guess form
        if ( empty($new_guess) ) {
            $this->print_board_n_form( $turn );
        } else {
            // if new guess, save it and evaluate it
            $this->guesses[] = $new_guess;
            $this->evaluations[] = $this->evaluate_guess($new_guess);
            $correct = array('full', 'full', 'full', 'full');
            // check for win or game over
            if ( $this->evaluations[$turn-1] == $correct ) {
                echo '<h1>Congratulations, you determined the sequence!</h1>';
                $this->print_board( $turn );
                $_SESSION['reset']=true;
            } else if ( $turn == 12 ) {
                echo '<h1>Too bad, you are out of guesses.</h1>';
                echo '<div>The sequence was ';
                $this->print_sequence();
                echo '</div>';
                $this->print_board( $turn );
                $_SESSION['reset']=true;
            } else {
                // neither win nor game over, continue.
                $this->print_board_n_form( $turn );
            }
        }
    }
    
    public function print_board( $turn ) {
            $this->print_guesses( $turn );
            $this->print_evaluations( $turn );
    }
    
    public function print_board_n_form( $turn ) {
        if ($this->duplication == true ) {
            // just a little reminder.
            echo '<h2>You are playing with duplicate colors allowed in the secret sequence.</h2>';
        } else {
            echo '<h2>You are playing with no duplicate colors allowed in the secret sequence.</h2>';
        }
        $this->print_board( $turn );
        $this->print_guess_form();
    }
    
    // guess should be a 4-string array with entries from within
    // the $possibilities array above.
    // returns an array of match evaluations: full, part, none
    // always scores best possible without doubling up: 
    // eg if answer has blue third and guess has blue first and third,
    // will score full/none rather than part/none or part/full
    public function evaluate_guess($guess) {
        $eval = array();
        $unused_colors = array();
        $unused_guess = array();
        // check for exact matches; throw unused indices into an array
        for ($i = 0 ; $i < 4 ; $i++ ) {
            if ($guess[$i] == $this->sequence[$i]) {
                $eval[] = 'full';
            } else {
                $unused_colors[] = $i;
            }
        }
        $unused_guess = $unused_colors;
        // cross-check unused indices for partial matches
        foreach ($unused_guess as $guess_index) {
            foreach ($unused_colors as $key => $color_index) {
                if ( $guess[$guess_index] == $this->sequence[$color_index] ) {
                    $eval[] = 'part';
                    // used up; throw away from array used for inside loop
                    // and break to next value of array in outside loop.
                    array_splice($unused_colors, $key, 1);
                    break;
                }
            }
        }
        // if we have fewer than four full/part matches, fill in with none.
        while ( count($eval) < 4 ) {
            $eval[] = 'none';
        }
        return $eval;
    }
    
    //prints entire game board with all current guesses filled in
    public function print_guesses( $turn ) {
        echo '<div class="playing-board">';
        $i=0;
        $current_guess = array();
        // up to current turn, fill in guesses. 
        for ( $i ; $i < $turn ; $i++ ) {
            $current_guess = $this->guesses[$i];
            echo '<div class="column guess-' . $i .'">';
            for ($j = 0 ; $j < 4 ; $j++ ) {
                echo '<div class="marble-spot ' . $current_guess[$j] . '-marble"> </div>';
            }
            echo '</div> <!-- .column -->';
        }
        // current turn and later, fill in blank spots.
        for ( $i ; $i < 12 ; $i++ ) {
            echo '<div class="column guess-' . $i .'">';
            for ($j = 0 ; $j < 4 ; $j++ ) {
                echo '<div class="marble-spot no-marble"> </div>';
            }
            echo '</div> <!-- .column -->';
        }
        echo '</div><!-- .playing-board -->';
    }
    
    // prints block of smiley faces according to evaluations
    public function print_evaluations( $turn ) {
        echo '<div class="evaluations">';
        for ( $i = 0 ; $i < $turn ; $i++ ) {
            echo '<div class="evaluation-block">';
            for ( $j = 0 ; $j < 4 ; $j++ ) {
                $face = $this->evaluations[$i][$j];
                if ( $face == 'full' ) {
                    echo '<div class="evaluation-face"><img src="smile.png" alt="full match" height=20 width=20 /></div>';
                }
                if ( $face == 'part' ) {
                    echo '<div class="evaluation-face"><img src="neutral.png" alt="partial match" height=20 width=20 /></div>';
                }
                if ( $face == 'none' ) {
                    echo '<div class="evaluation-face"><img src="frown.png" alt="no match" height=20 width=20 /></div>';
                }            
            }
            echo '</div>';
        }
        echo '</div>';
    }

    // prints guessing form
    public function print_guess_form() {
        echo '<div class="guess-form">';
        echo '<form id="guess-form" class="color-buttons">';
        for ($i = 1 ; $i <= 4 ; $i++) {
            echo '<fieldset>';
            echo '<legend>Spot '.$i.'</legend>';
            echo '<div class="form-pairing"><label for="'.$i.'-1"><input type="radio" name="spot-'.$i.'" id="'.$i.'-1" value="red" checked> <div class="form-marble red-marble"> </div></label></div>';
            echo '<div class="form-pairing"><label for="'.$i.'-2"><input type="radio" name="spot-'.$i.'" id="'.$i.'-2" value="orange"> <div class="form-marble orange-marble"> </div></label></div>';
            echo '<div class="form-pairing"><label for="'.$i.'-3"><input type="radio" name="spot-'.$i.'" id="'.$i.'-3" value="yellow"> <div class="form-marble yellow-marble"> </div></label></div>';
            echo '<div class="form-pairing"><label for="'.$i.'-4"><input type="radio" name="spot-'.$i.'" id="'.$i.'-4" value="green"> <div class="form-marble green-marble"> </div></label></div>';
            echo '<div class="form-pairing"><label for="'.$i.'-5"><input type="radio" name="spot-'.$i.'" id="'.$i.'-5" value="blue"> <div class="form-marble blue-marble"> </div></label></div>';
            echo '<div class="form-pairing"><label for="'.$i.'-6"><input type="radio" name="spot-'.$i.'" id="'.$i.'-6" value="purple"> <div class="form-marble purple-marble"> </div></label></div>';
            echo '</fieldset>';
        }
        echo '</form><!-- form for color selection -->';
        echo '<input type="submit" id="guess-button" onClick="makeGuess();" value="Make This Guess">';
        echo '</div><!-- .guess-form -->';
    }
    
    // prints secret sequence. Only used within play_game, if game is lost.
    protected function print_sequence() {
        for ($i = 0 ; $i < 4 ; $i++) {
            echo '<div class="answer-sequence form-marble ' . 
                $this->sequence[$i] . '-marble"></div>';
        }
    }
}