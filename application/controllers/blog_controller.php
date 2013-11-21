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

    function view($blogId=null) {
        $data['title'] = "博客";
        $data['stylesheet'] = "";
        $data['script'] = "";
        $data['blog'] = $this->blog_model->get_blogs($blogId);
        if($blogId!==null) {
            $data['blog_next']=$this->blog_model->get_blogs($blogId+1);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        if ($blogId !== null) {
            $this -> load -> view('templates/blog_single', $data);
        } else {
           # print_r($data);
            $this->load->view('pages/blog', $data);
        }
        $this->load->view('templates/footer', $data);

    }

}