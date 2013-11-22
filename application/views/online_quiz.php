<html>
<head>
    <title>Online Quiz</title>
</head>
<body>
<?php //echo validation_errors(); ?>
<?php
    echo form_open('quiz/questions/'.$next_question);
?>
<div><input type="submit" value="Submit" /></div>
<?=form_close();?>

</body>
</html>