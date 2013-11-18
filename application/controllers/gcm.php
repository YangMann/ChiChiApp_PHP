<?php
/**
 * Created by PhpStorm.
 * User: yamamaki
 * Date: 13-11-18
 * Time: 12:14
 */
define("GOOGLE_API_KEY", "AIzaSyA4g71gAcTsRnmIE78n9iSdlvTqwLDCAcM");
define("GOOGLE_GCM_URL", "https://android.googleapis.com/gcm/send");

class Gcm extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
    }

    function index() {
    }

    function send_gcm_notify($reg_id) {
        $message = "Google Cloud Messaging works well!";
        $fields = array(
            'registration_ids' => array($reg_id),
            'data' => array("message" => $message)
        );
        $headers = array(
            'Authorization: key='.GOOGLE_API_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, GOOGLE_GCM_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Problem occured: '.curl_error($ch));
        }

        curl_close($ch);
        echo $result;
    }

}