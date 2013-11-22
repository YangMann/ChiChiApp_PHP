<?php
/**
 * Created by PhpStorm.
 * User: JeffreyZhang
 * Date: 13-11-13
 * Time: 下午4:24
 */

class Controller_A extends CI_Controller {
    // AJAX Handler
    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('tank_auth');
    }

    function index($page = null) {
        $data['title'] = "";
        $data['stylesheet'] = "";
        $data['script'] = "";
        $data['is_logged_in'] = $this->tank_auth->is_logged_in();
        $data['username'] = $this->tank_auth->get_username();
        switch($page){
            case "login":
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                break;
            default;
        }
    }

    function blog($blogId = null) {
//        $purpose = $this->input->get('t');
//        print_r($blogId);
        $purpose = "";
        switch ($purpose) {
            case 'edit':
                echo "edit!!!!";
                break;
            default:
                $data['title'] = "博客";
                $data['stylesheet'] = "";
                $data['script'] = "";
                $data['blog'] = $this->blog_model->get_blogs($blogId);
                if($blogId!==null ) {
                    $data['blog_next']=$this->blog_model->get_blogs($blogId+1);
                }
                if($blogId=="c"){
                    $this->load->view('pages/blog_collections', $data);
                }
                else if ($blogId !== null) {
                    $this -> load -> view('templates/blog_single_content', $data);
                } else {
                    $this->load->view('pages/blog_content', $data);
                }
                break;
        }
    }

} 