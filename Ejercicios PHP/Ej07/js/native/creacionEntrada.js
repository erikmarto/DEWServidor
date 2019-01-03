$(function() {
        //text editor
    //TODO some functions don't show on entry html
    $('textarea#froala-editor').froalaEditor({
        toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline',
                         'strikeThrough', 'subscript', 'superscript', '|',
                         'fontFamily', 'fontSize', 'color', 'lineHeight', '|',
                         'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote']    
    });

})