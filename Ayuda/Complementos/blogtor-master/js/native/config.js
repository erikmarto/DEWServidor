$(function() {
        //profile picture preview
        $("#imageUpload").change(function() {
            readURL(this);
        });
        
        $('button#sendEntry').on('click', submitEntry);
});

//entrada creation
function submitEntry(e) {
    let _html = $('textarea#froala-editor').froalaEditor('html.get');
    console.log(_html);

}


//config
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
