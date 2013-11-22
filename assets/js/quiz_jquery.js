$(document).ready(function () {
    $("#post_former_answer_button").click(function () {
        var $answer = $("#answer").val();
        $("#post_former_answer").val($answer);
    });
    $("#post_next_answer_button").click(function () {
        var $answer = $("#answer").val();
        $("#post_next_answer").val($answer);
    })
});