<?php
/**
 * Created by PhpStorm.
 * User: yamamaki
 * Date: 11/21/13
 * Time: 2:34 PM
 */

class questions_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    public function get_questions() {
        return $this->db->get('adventure_questions')->result_array();
    }
    public function get_question($question_id) {
        $this->db->select('id, question, score, genre, answer');
        $this->db->from('adventure_questions');
        $this->db->where('id', $question_id);
        return $this->db->get()->result_array();
    }
}