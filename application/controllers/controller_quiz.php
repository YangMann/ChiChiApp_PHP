<?php
/**
 * Created by PhpStorm.
 * User: yamamaki
 * Date: 11/21/13
 * Time: 2:17 PM
 */

class Controller_Quiz extends CI_Controller
{
    public function questions($question_id)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('questions_model');

        $former_question_id = $question_id - 1;
        $next_question_id = $question_id + 1;
        $data['question_id'] = $question_id;
        $data['former_question_id'] = $former_question_id;
        $data['next_question_id'] = $next_question_id;

        $question = $this->questions_model->get_question($question_id);
        $data['question'] = $question[0]['question'];

        if ($this->input->post()) {
            $data['answer'] = $_POST['answer'];
            $answer = $data['answer'];
            $this->questions_model->answer(1, $former_question_id, $answer);
        } else {
            $data['answer'] = '';
        }
        $this->load->view('templates/online_quiz', $data);

//        if ($this->questions_model->is_question_empty($former_question_id)) {
//            echo 'it is the first question';
//            $this->load->view('online_quiz', $data);
//        }
//        else if ($this->questions_model->is_question_empty($next_question_id)) {
//            echo 'it is the last question';
//
//            $this->load->view('online_quiz', $data);
//        }
//        else {
//            $this->load->view('online_quiz', $data);
//        }


    }
}