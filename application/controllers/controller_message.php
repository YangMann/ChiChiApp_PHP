<?php
/**
 * Created by PhpStorm.
 * User: icedream
 * Date: 13-11-28
 * Time: 下午2:49
 */

class Controller_Message extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('tank_auth');
        $this->load->model('message_model');
        date_default_timezone_set("PRC");
        $this->load->database();
    }
    function index() {
        $this->view();
    }

    function view() {
        $data['title'] = "吃吃留言板";
        $data['stylesheet'] = "";
        $data['script'] = "";
        $data['is_logged_in'] = $this->tank_auth->is_logged_in();
        $data['username'] = $this->tank_auth->get_username();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this -> load -> view('pages/message_form', $data);
        $this->load->view('templates/footer', $data);

    }
    function up(){
        $message=$_POST['message_content'];
        $data['title'] = "吃吃留言板";
        $data['stylesheet'] = "";
        $data['script'] = "";
        if($message!=="")
            $data['message']="true";
        else
            $data['message']="false";
        $data['is_logged_in'] = $this->tank_auth->is_logged_in();
        $data['username'] = $this->tank_auth->get_username();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this -> load -> view('pages/message_success', $data);
        $this->load->view('templates/footer', $data);

        if($message!=="" && $this->tank_auth->is_logged_in()){
            $d=array('user'=>$this->tank_auth->get_user_id(),'time'=>date('Y-m-d H:i:s',time()),'content'=>$message);
            $this->message_model->insert_message($d);
        }
    }

}
