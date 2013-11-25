$(document).ready(function () {
    $("#submit").click(function () {
        var $user_id = $("#user_id").val();
        var $question_id = $("#question_id").val();
        var $score = $("#score").val();
        var $next_hop_user = $("#next_hop_user").val();
        var $next_hop_question = $("#next_hop_question").val();
        $.ajax({
            type: "POST",
            url: 'http://localhost/mark/' + $next_hop_user + '/' + $next_hop_question,
            data: {
                user_id: $user_id,
                question_id: $question_id,
                score: $score,
                next_hop_user: $next_hop_user,
                next_hop_question: $next_hop_question
            },
            success: function () {
                location.href = 'http://localhost/mark/' + $next_hop_user + '/' + $next_hop_question;
            }
        });
    });
});