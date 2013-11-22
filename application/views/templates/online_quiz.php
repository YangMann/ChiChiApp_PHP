<?php
include_once 'Michelf/Markdown.php';
use Michelf\Markdown;

?>
<script type="text/javascript" src="/assets/js/quiz_jquery.js"></script>
<?php
$old_answer = ($this->questions_model->get_answer($user_id, $question_id));
$next_question = $this->questions_model->get_question($next_question_id);
?>
<div class="wd-inner">
    <div class="g-r">
        <div class="qz-current-question-wrapper u-1-2">
            <div class="g">
                <div class="u-1">
                    <?php if ($next_question) {
                        ?>
                        <div class="qz-current-question-num">
                            <?php echo $question_id;
                            ?>
                        </div>
                    <?php
                    }
                    if ($next_question) {
                        ?>
                        <div class="qz-current-question-score">
                            <?php if ($next_question) echo $question_score ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="qz-current-question-genre">
                <?php if ($next_question) echo $question_genre ?>
            </div>
            <article class="qz-current-question">
                <?php if ($next_question) echo Markdown::defaultTransform($question) ?>
            </article>

            <div class="g">
                <div class="u-1">
                    <div class="qz-input-group">
                        <?php if ($next_question) {
                            ?>
                            <textarea class="fm-control" type='text' id='answer'><?= $old_answer ?></textarea>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>

            <div class="g qz-action">
                <div class="u-1-5">

                    <?php

                    if ($next_question) {
                        if ($this->questions_model->get_question($former_question_id)) {
                            echo form_open('adventure/questions/' . $former_question_id);
                            ?>
                            <input type='hidden' name='direction' value='back'>
                            <input type='hidden' name='post_former_answer' id='post_former_answer'>
                            <button class="bt bt-block bt-default" type='submit' id='post_former_answer_button'>上一题
                            </button>
                            <?php
                            echo form_close();
                        }
                    }?>
                </div>
                <div class="u-3-5">
                    <?php
                    if (!$next_question) {
                        ?>
                        <div class="qz-finish-logo"></div>
                    <?php
                    }
                    ?>


                </div>
                <div class="u-1-5">
                    <?php
                    //                    $next_question = $this->questions_model->get_question($next_question_id);
                    if ($next_question) {
                        if (!$next_question[0]['question']) {
                            echo form_open('adventure/questions/52');
                            ?>
                            <input type='hidden' name='direction' value='end'>
                            <input type='hidden' name="former_question_id" value="<?= $question_id ?>">
                            <input type='hidden' name='post_next_answer' id='post_next_answer'>
                            <button class='bt bt-block bt-success' type='submit' id='post_next_answer_button'>完成
                            </button>
                            <?php
                            echo form_close();
                        } else {
                            echo form_open('adventure/questions/' . $next_question_id);
                            ?>
                            <input type='hidden' name='direction' value='next'>
                            <input type='hidden' name='post_next_answer' id='post_next_answer'>
                            <button class='bt bt-block bt-success' type='submit' id='post_next_answer_button'>下一题
                            </button>
                            <?php
                            echo form_close();
                        }
                    } else {
                        ?>
                        <p class="qz-finish-prompt">
                            回答完毕！晚上11:00之前可以随意修改答案~
                        </p>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="qz-answer-sheet">
        <h2>答题卡</h2>

        <?php
        $all_answers = $this->questions_model->get_answers($user_id);
        $all_questions = $this->questions_model->get_questions();
        for ($i = 0; $i < sizeof($all_questions) - 1; $i++) {
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
                    <div class="g qz-card-input-wrapper">
                        <div class="u-1">
                            <div class="qz-card-input-group">
                                <textarea class="fm-control" id='answer'
                                          disabled>未回答</textarea>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    ?>
                    <div class="g qz-card-input-wrapper">
                        <div class="u-1">
                            <div class="qz-card-input-group">
                                <textarea class="fm-control" id='answer'
                                          disabled><?= $all_answers[$i]['answer']?></textarea>
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
        ?>
    </div>
</div>
