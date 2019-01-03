$(function() {
    $(".comment-toggler").on('click', toggleComments);
    $(".comments-dropdown").hide();
});


function toggleComments() {
    let _commentId = $(this).prop("id").replace("toggle-comments", "");
    let _$toggledNode = $(`#comments${_commentId}`);
    console.log($(`#comments${_commentId}`));
    console.log(_$toggledNode);
    _$toggledNode.slideToggle();
}