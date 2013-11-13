<?php
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

        switch ($page) {
            case 'home':
                $data['title'] = "首页";
                break;
            case 'blog':
                $data['title'] = '博客';
                break;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);

    }

} 