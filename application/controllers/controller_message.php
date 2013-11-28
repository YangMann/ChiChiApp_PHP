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
        $this->load->library('tank_auth');
        $this->load->model('message_model');
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

    }

}
