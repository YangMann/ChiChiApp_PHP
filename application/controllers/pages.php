<?php require "blog_controller.php";
/**
 * Created by PhpStorm.
 * User: JeffreyZhang
 * Date: 13-11-12
 * Time: 下午6:38
 */

class Pages extends CI_Controller {

    public function view($page = 'home') {

        if (!file_exists('application/views/pages/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = "";
        $data['stylesheet'] = "";
        $data['script'] = "";
        $this->load->model('blog_model');

        switch ($page) {
            case 'home':
                $data['title'] = "首页";
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer', $data);
                break;
            case 'blog':
                $data['title'] = "博客";
                $this->load->helper('url');
                $this->load->library('tank_auth');
               // $data['blog'] = $this->blog_model->get_blogs(null);
                Blog_Controller::view(null);

                break;
            case 'gcm':
                $data['title'] = 'GCM';
                echo 'Google Cloud Messaging Test';
                break;
            case 'phpinfo':
                $this->load->view('pages/phpinfo');
        }
    }

} 