$(function() {
    

    //$('.entrada-texto').on('click', redirectEntrada);

    //text editor
    //TODO some functions don't show on entry html
    $('textarea#froala-editor').froalaEditor({
        toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline',
                         'strikeThrough', 'subscript', 'superscript', '|',
                         'fontFamily', 'fontSize', 'color', 'lineHeight', '|',
                         'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote']    
    });

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

//entradas
function redirectEntrada() {
    var _id = $(this).parent().prop('id').replace("texto", '');
    console.log(_id);
    window.location.href = `?r=blog/entrada&id=${_id}`;
}