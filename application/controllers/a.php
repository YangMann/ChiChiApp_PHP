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
        $purpose = $this->input->get('t');
        switch ($purpose) {
            case 'edit':
                echo "edit!!!!";
                break;
            default:
                $data['blog'] = $this->blog_model->get_blogs($blogId);
                if ($blogId !== null) {
                    $this->load->view('templates/blog_single_content', $data);
                } else {
                    $this->load->view('pages/blog_content', $data);
                }
                break;
        }
    }

} 