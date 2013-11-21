<?php
/**
 * Created by PhpStorm.
 * User: yamamaki
 * Date: 11/21/13
 * Time: 2:17 PM
 */

class Quiz_Controller extends CI_Controller
{
    public function questions($question_id)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data['question_id'] = $question_id;
        $this->load->model('questions_model');
        $question = $this->questions_model->get_question($question_id);
        $data['question'] = $question;
        $data['next_question'] = $question_id+1;
        print_r($data);
        $this->load->view('onlineQuiz', $data);
    }
}