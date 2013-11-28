<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: icedream
 * Date: 13-11-28
 * Time: 下午2:50
 */

class Message_Model extends CI_Model  {
    function __construct() {
        parent::__construct();
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

    function insert_blog($data) {
        $this->db->insert('message', $data);
    }

    function update_blog($messageId, $data) {
        $id = $messageId;
        $this->db->where('id', $id);
        $this->db->update('message', $data);
    }

    function delete_blog($messageId) {
        $id = $messageId;
        $this->db->delete('blog', array('id' => $id));
    }
} 