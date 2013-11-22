<script type="text/javascript" src="/assets/js/quiz_jquery.js"></script>
<?php
echo 'Question ' . $question_id . '<br />';
echo $question . '<br />';
$old_answer = ($this->questions_model->get_answer($user_id, $question_id));
echo "<la
bel><input type='text' id='answer' value=" . $old_answer . "></label>";

if ($this->questions_model->get_question($former_question_id)) {
    echo form_open('quiz/questions/' . $former_question_id);
    echo "<la
bel><input type='hidden' name='direction' value='back'></label>";
    echo "<la
bel><input type='hidden' name='post_former_answer' id='post_former_answer'></label>";
    echo "<button type='submit' id='post_former_answer_button'>Back</button>";
    echo form_close();
}

if ($this->questions_model->get_question($next_question_id)) {
    echo form_open('quiz/questions/' . $next_question_id);
    echo "<la
bel><input type='hidden' name='direction' value='next'></label>";
    echo "<la
bel><input type='hidden' name='post_next_answer' id='post_next_answer'></label>";
    echo "<button type='submit' id='post_next_answer_button'>Next</button>";
    echo form_close();
}
?>


<?php
echo "<br />";
$all_answers = $this->questions_model->get_answers($user_id);
$all_questions = $this->questions_model->get_questions();
foreach ($all_questions as $item) {
    echo "Question id: " . $item['id'] . "<br />";
    echo "Score: " . $item['score'] . "<br />";
    echo "Genre: " . $item['genre'] . "<br />";
    echo "is_answer_or_not: ";
    if ($this->questions_model->is_answer_empty($user_id, $item['id'])) {
        echo "FALSE<br />";
    } else echo "Answer: " . $all_answers[$item['id'] - 1]['answer'] . "<br />";
    echo "Question: " . $item['question'] . "<br /><br />";

}
?>
</body>
</html>