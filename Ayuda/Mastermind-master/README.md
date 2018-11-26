# Mastermind
An AJAX and PHP implementation of the classic code-breaking game, made as programming practice.

## File Tour
Mastermind.class.php: every game is an object of this class. Constructor creates the secret color sequence. Includes methods for evaluating guesses, determining win or loss, and printing board, evaluations, and guess form (if game is in progress).

index.php: wrapper with "loading" message; has instructions and new game buttons

index-ajax.php: content to be pulled into main game area at start and upon guess submission

mastermind.js: pulls in index-ajax at the beginning and with guess submission

pngs: for scoring guesses

css: self-explanatory

jquery: included because my internet went out for nearly a week while working on this
