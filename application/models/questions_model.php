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
        return $this->db->get('questions_table')->result_array();
    }
    public function get_question($question_id) {
        $this->db->select('question_id, description');
        $this->db->from('questions_table');
        $this->db->where('question_id', $question_id);
        return $this->db->get()->result_array();
    }
}