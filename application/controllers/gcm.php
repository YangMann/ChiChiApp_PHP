<?php
/**
 * Created by PhpStorm.
 * User: yamamaki
 * Date: 13-11-18
 * Time: 12:14
 */

class Gcm extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('gcm');
    }

    function index() {
        $data['title'] = 'Google Cloud Message';
        $data['heading'] = 'Testing';
    }

    public function send_gcm() {
        //simple adding message.
        $this->gcm->setMessage('Test message '.date('d.m.Y H:s:i'));

        //add recepients
        $this->gcm->addRecepient('RegistrationId');
        $this->gcm->addRecepient('New reg id');

        //set additional data
        $this->gcm->setData(array(
            'some_key' => 'some_val'
        ));

        //set time to live
        $this->gcm->setTtl(500);
        // $this->gcm->setTtl(false);

        //set group for messages if needed
        $this->gcm->setGroup('Test');
        //$this->gcm->setGroup(false);

        //send messages
        if ($this->gcm->send())
            echo 'Success for all messages';
        else
            echo 'Some messages hava errors';

        //see responsed for more info
        print_r($this->gcm->status);
        print_r($this->gcm->messageStatuses);

        die(' Worked.');
    }
}