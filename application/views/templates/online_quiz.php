<?php
include_once 'Michelf/Markdown.php';
use Michelf\Markdown;

?>
<script type="text/javascript" src="/assets/js/quiz_jquery.js"></script>
<?php
$old_answer = ($this->questions_model->get_answer($user_id, $question_id));
?>
<div class="wd-inner">
    <div class="g-r">
        <div class="qz-current-question-wrapper u-1-2">
            <div class="g">
                <div class="u-1">
                    <div class="qz-current-question-num">
                        <?= $question_id ?>
                    </div>
                    <div class="qz-current-question-score">
                        <?= $question_score ?>
                    </div>
                </div>
            </div>
            <div class="qz-current-question-genre">
                <?= $question_genre ?>
            </div>
            <article class="qz-current-question">
                <?= Markdown::defaultTransform($question) ?>
            </article>

            <div class="g">
                <div class="u-1">
                    <div class="qz-input-group">
                        <textarea class="fm-control" type='text' id='answer'><?= $old_answer ?></textarea>
                    </div>
                </div>
            </div>

            <div class="g qz-action">
                <div class="u-1-5">

                    <?php

                    if ($this->questions_model->get_question($former_question_id)) {
                        echo form_open('quiz/questions/' . $former_question_id);
                        ?>
                        <input type='hidden' name='direction' value='back'>
                        <input type='hidden' name='post_former_answer' id='post_former_answer'>
                        <button class="bt bt-block bt-default" type='submit' id='post_former_answer_button'>上一题</button>
                        <?php
                        echo form_close();
                    }?>
                </div>
                <div class="u-3-5">


                </div>
                <div class="u-1-5">
                    <?php
                    if ($this->questions_model->get_question($next_question_id)) {
                        echo form_open('quiz/questions/' . $next_question_id);
                        ?>
                        <input type='hidden' name='direction' value='next'>
                        <input type='hidden' name='post_next_answer' id='post_next_answer'>
                        <button class='bt bt-block bt-success' type='submit' id='post_next_answer_button'>下一题</button>
                        <?php
                        echo form_close();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    $all_answers = $this->questions_model->get_answers($user_id);
    $all_questions = $this->questions_model->get_questions();
    for ($i = 0; $i < sizeof($all_questions); $i++) {
        if ($i % 3 === 0) {
            ?>
            <div class="g-r">
        <?php
        }
        ?>
        <div class="u-1-3 qz-card-question-wrapper">
            <div class="g">
                <div class="u-1">
                    <div class="qz-card-question-num">
                        <?= $all_questions[$i]["id"] ?>
                    </div>
                    <div class="qz-card-question-score">
                        <?= $all_questions[$i]["score"] ?>
                    </div>
                </div>
            </div>
            <article class="qz-card-question">
                <?= Markdown::defaultTransform($all_questions[$i]["question"]) ?>
            </article>
            <?php
            if ($this->questions_model->is_answer_empty($user_id, $all_questions[$i]['id'])) {
                ?>
                <p>未回答</p>
            <?php
            } else {
                ?>
                <div class="g qz-card-input-wrapper">
                    <div class="u-1">
                        <div class="qz-card-input-group">
                            <textarea class="fm-control" id='answer'
                                      disabled><?= Markdown::defaultTransform($all_answers[$i]['answer']) ?></textarea>
                        </div>
                    </div>
                </div>

            <?php
            }?>
        </div>
        <?php
        if ($i % 3 == 2) {
            ?>
            <!-- end of div.g-r --></div>
        <?php
        }
    }
    foreach ($all_questions as $item) {
        echo "Question id: " . $item['id'] . "<br />";
        echo "Score: " . $item['score'] . "<br />";
        echo "Genre: " . $item['genre'] . "<br />";
        echo "is_answer_or_not: ";
        if ($this->questions_model->is_answer_empty($user_id, $item['id'])) {
            echo "FALSE<br />";
        } else echo "Answer: " . $all_answers[$item['id'] - 1]['answer'] . "<br />";
        $html = Markdown::defaultTransform($item['question']);
        echo "Question: " . $html . "<br /><br />";

    }
    ?>
</div>
