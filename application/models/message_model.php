<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class message_model extends CI_Model  {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_message($messageId) {
        $message = array();
        if ($messageId !== null) {
            $query = $this->db->get_where('message', array('id' => $messageId));
            if ($query->num_rows() == 1) {
                foreach ($query->result() as $row) {
                    $message['id'] = $row->id;
                    $message['user'] = $row->user;
                    $message['time'] = $row->time;
                    $message['content'] = $row->content;
                    $message['feedback'] = $row->feedback;
                    $message['image'] = $row->image;
                }
                return $message;
            }
        }
        return -1;
    }
    public function get_all_messages(){
        return $this->db->get('message')->result_array();
    }
    function insert_message($data) {

        $user=$data['user'];
        $time=$data['time'];
        $content=$data['content'];
        $sql = "INSERT INTO message (user,time,content)
        VALUES (" . $user. ",'" .$time . "','" . $content . "'". ")";
        $this->db->query($sql);
    }

    function update_message($messageId, $data) {
        $id = $messageId;
        $this->db->where('id', $id);
        $this->db->update('message', $data);
    }

    function delete_message($messageId) {
        $id = $messageId;
        $this->db->delete('blog', array('id' => $id));
    }
} 