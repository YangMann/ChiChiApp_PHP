<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
echo form_open('quiz/questions/' . $next_question_id);
echo 'Question ' . $question_id . '<br />';
echo $question . '<br />';
?>
<label><input type="text" name="answer" value="answer"></label>
<button type="submit">Submit</button>
<?= form_close(); ?>
</body>
</html>