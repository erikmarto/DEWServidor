$(document).ready(function () {
	//start the game when the page loads
    $('#game-wrapper').load('index-ajax.php');
});

//called by submit button
function makeGuess() {
    var formData = {
            'spot-1' : $('#guess-form input:radio[name=spot-1]:checked').val(),
            'spot-2' : $('#guess-form input:radio[name=spot-2]:checked').val(),
            'spot-3' : $('#guess-form input:radio[name=spot-3]:checked').val(),
            'spot-4' : $('#guess-form input:radio[name=spot-4]:checked').val()
    };
    var posting = $.ajax({
        url: 'index-ajax.php',
        data: formData,
        success: function(data) {
            $('#game-wrapper').empty().append(data);
        }
    });
}