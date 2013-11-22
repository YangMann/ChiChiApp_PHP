<html>
<head>
    <title>Online Quiz</title>
</head>
<body>
<?php //echo validation_errors(); ?>
<?php
echo form_open('quiz/questions/' . $next_question_id);
echo 'Question ' . $question_id . ' <br />';
echo $question . '<br />';
?>
<div><input type="text" name='answer' value="answer"/></div>
<!--<div><input type="submit" value="Back" /></div>-->
<div><input type="submit" name='next' value="next"/></div>
<?=form_close();?>

</body>
</html>