<?php
/**
 * Created by PhpStorm.
 * User: JeffreyZhang
 * Date: 13-11-12
 * Time: 下午11:43
 */

class Blog_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();

//        $this->load->scaffolding('blog');
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('blog_model');
    }

    function index() {
        $this->view($blogId = null);
    }

    function view($blogId) {
        $data['blog'] = $this->blog_model->get_blogs($blogId);
        if ($blogId !== null) {
            $this -> load -> view('templates/blog_single', $data);
        } else {
            print_r($data);
            $this->load->view('pages/blog', $data);
        }
    }


}