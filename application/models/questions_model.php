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

    public function is_question_empty($question_id)
    {
        if (get_question($question_id)) return FALSE;
        else return TRUE;
    }

    public function get_questions() {
        return $this->db->get('adventure_questions')->result_array();
    }
    public function get_question($question_id) {
//        $this->db->select('id, question, score, genre, answer');
//        $this->db->from('adventure_questions');
//        $this->db->where('id', $question_id);
//        return $this->db->get()->result_array();
        $sql = "SELECT * FROM adventure_questions WHERE id=" . $this->db->escape($question_id);
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function is_answer_empty($user_id, $answer_id)
    {
        $sql = "SELECT * FROM users_answers WHERE user_id=" . $this->db->escape($user_id) . " AND answer_id=" . $this->db->escape($answer_id);
        $query = $this->db->query($sql);
        $result = $query->result();
        if (!$result) return TRUE;
        else return FALSE;
    }

    public function insert_answer($user_id, $answer_id, $answer)
    {
        $sql = "INSERT INTO users_answers (user_id, answer_id, answer)
        VALUES (" . $this->db->escape($user_id) . ", " . $this->db->escape($answer_id) . ", " . $this->db->escape($answer) . ")";
        $this->db->query($sql);
    }

    public function update_answer($user_id, $answer_id, $answer)
    {
        $sql = "UPDATE users_answers SET answer = " . $this->db->escape($answer) . " WHERE user_id = " . $this->db->escape($user_id) . " AND answer_id = " . $this->db->escape($answer_id);
        $this->db->query($sql);
    }

    public function answer($user_id, $answer_id, $answer)
    {
        if (questions_model::is_answer_empty($user_id, $answer_id)) {
            questions_model::insert_answer($user_id, $answer_id, $answer);
        } else {
            questions_model::update_answer($user_id, $answer_id, $answer);
        }
    }
}