<script type="text/javascript" src="/assets/js/libs/jquery/jquery-1.10.2.min"></script>
<script type="text/javascript" src="/assets/js/quiz_mark_jquery.js"></script>

<?php
echo "User_id: " . $user_id . "<br />";
echo "#" . $correct_answer['id'] . "        " . $correct_answer['score'] . "分<br />";
echo "正确答案: " . $correct_answer['answer'] . "<br />";
echo "答案: ";
if (!$this->questions_model->is_answer_empty($user_id, $question_id)) echo $user_answer . "<br />";
else echo "<br />";
$next_hop_question = $question_id + 1;
$next_hop_user = $user_id;
//    echo form_open('mark/'.$next_hop_user.'/'.$next_hop_question);
echo "<input type='hidden' name='user_id' id='user_id' value=" . $user_id . ">";
echo "<input type='hidden' name='question_id' id='question_id' value=" . $question_id . ">";
echo "评分:<input type='text' name='score' id='score'><br />";
echo "跳转至:<br />";
echo "参赛ID:<input type='text' name='next_hop_user'id='next_hop_user' value=" . $next_hop_user . "><br />";
echo "题目序号:<input type='text' name='next_hop_question' id='next_hop_question' value=" . $next_hop_question . ">      ";
echo "<button type='submit' id='submit'>提交</button>";
echo "<br /><br />";
//    echo form_close();


