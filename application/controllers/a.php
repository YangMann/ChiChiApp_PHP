<?php
/**
 * Created by PhpStorm.
 * User: JeffreyZhang
 * Date: 13-11-13
 * Time: 下午4:24
 */

class A extends CI_Controller {
    // AJAX Handler
    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('blog_model');
    }

    function home() {
        echo "HOME!!!!";
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
                if ($blogId !== null) {
                    $this -> load -> view('templates/blog_single', $data);
                } else {
                    $this->load->view('pages/blog_content', $data);
                }
                break;
        }
    }

} 