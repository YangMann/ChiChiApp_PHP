<?php
/**
 * Created by PhpStorm.
 * User: yamamaki
 * Date: 11/21/13
 * Time: 2:17 PM
 */

class Controller_Quiz extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('tank_auth');
    }

    public function questions($question_id) {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('questions_model');
        if (!$this->tank_auth->is_logged_in()) {
            redirect('');
        }
        $user_id = $this->tank_auth->get_user_id();
        $data['username'] = $this->tank_auth->get_username();

        $former_question_id = $question_id - 1;
        $next_question_id = $question_id + 1;
        $data['is_logged_in'] = $this->tank_auth->is_logged_in();
        $data['stylesheet'] = "";
        $data['script'] = "";
        $data['user_id'] = $user_id;
        $data['question_id'] = $question_id;
        $data['former_question_id'] = $former_question_id;
        $data['next_question_id'] = $next_question_id;
        $data['post_question_id'] = $question_id;

        $question = $this->questions_model->get_question($question_id);
        $data['question'] = $question[0]['question'];
        $data['question_score'] = $question[0]['score'];
        $data['question_genre'] = $question[0]['genre'];

        if ($this->input->post()) {
            if ($_POST['direction'] === 'back') {
                $data['answer'] = $_POST['post_former_answer'];
                $answer = $data['answer'];
                $this->questions_model->answer($user_id, $next_question_id, $answer);
            } else if ($_POST['direction'] === 'next') {
                $data['answer'] = $_POST['post_next_answer'];
                $answer = $data['answer'];
                $this->questions_model->answer($user_id, $former_question_id, $answer);
            }

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

    public function questions_($question_id) {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('questions_model');
        if (!$this->tank_auth->is_logged_in()) {
            redirect('');
        }
        $user_id = $this->tank_auth->get_user_id();
        $data['username'] = $this->tank_auth->get_username();

        $former_question_id = $question_id - 1;
        $next_question_id = $question_id + 1;
        $data['is_logged_in'] = $this->tank_auth->is_logged_in();
        $data['stylesheet'] = "";
        $data['script'] = "";
        $data['title'] = "吃吃大冒险";
        $data['user_id'] = $user_id;
        $data['question_id'] = $question_id;
        $data['former_question_id'] = $former_question_id;
        $data['next_question_id'] = $next_question_id;
        $data['post_question_id'] = $question_id;

        $question = $this->questions_model->get_question($question_id);
        $data['question'] = $question[0]['question'];
        $data['question_score'] = $question[0]['score'];
        $data['question_genre'] = $question[0]['genre'];

        if ($this->input->post()) {
            if ($_POST['direction'] === 'back') {
                $data['answer'] = $_POST['post_former_answer'];
                $answer = $data['answer'];
                $this->questions_model->answer($user_id, $next_question_id, $answer);
            } else if ($_POST['direction'] === 'next') {
                $data['answer'] = $_POST['post_next_answer'];
                $answer = $data['answer'];
                $this->questions_model->answer($user_id, $former_question_id, $answer);
            }

        } else {
            $data['answer'] = '';
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/cover', $data);
        $this->load->view('templates/online_quiz_wrapped', $data);
        $this->load->view('templates/footer', $data);
    }

    public function mark($user_id, $question_id)
    {

    }
}