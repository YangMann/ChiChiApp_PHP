<?php
/**
 * Created by PhpStorm.
 * User: JeffreyZhang
 * Date: 13-11-15
 * Time: 下午7:22
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller_Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('tank_auth', 'form_validation'));
        $this->load->model('blog_model');
    }

    function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        } else {
            $data['blog'] = $this->blog_model->get_blogs(null);
            $data['userId'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();

            $this->load->view('template/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('template/footer', $data);
        }
    }

    function create() {
        $data['userId'] = $this->tank_auth->get_user_id();
        $data['username'] = $this->tank_auth->get_username();

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('summary', 'summary', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/create', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = $_POST;
            $this->blog_model->insert_blog($data);
            redirect('admin');
        }
    }

    function edit($blogId) {
        $data['userId'] = $this->tank_auth->get_user_id();
        $data['username'] = $this->tank_auth->get_username();
        $data['blog'] = $this->blog_model->get_blogs($blogId);

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('summary', 'summary', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin_html_head', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('template/html_tail', $data);
        } else {
            $data = $_POST;
            $this->blog_model->update_blog($data);
            redirect('admin');
        }
    }

    function delete($blogId) {
        $this->blog_model->delete_blog($blogId);
        redirect('admin');
    }

    function logout() {
        redirect('/auth/logout');
    }

}
