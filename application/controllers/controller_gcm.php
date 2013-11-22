<?php
/**
 * Created by PhpStorm.
 * User: yamamaki
 * Date: 13-11-18
 * Time: 12:14
 */

define("GOOGLE_API_KEY", "AIzaSyA4g71gAcTsRnmIE78n9iSdlvTqwLDCAcM");
define("GOOGLE_GCM_URL", "https://android.googleapis.com/gcm/send");
require_once 'HttpClient.class.php';

class Controller_Gcm extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helpers('url');
    }

    function index() {
    }

    function send_gcm_notify($reg_id) {
        $message = "Google Cloud Messaging works well!";
        $fields = array(
            'registration_ids' => array($reg_id),
            'data' => array("message" => $message)
        );
        $pageContents = HttpClient::quickPost(GOOGLE_GCM_URL, $fields);
        echo $pageContents;
////        echo json_encode($fields);
//        $data = urldecode(http_build_query($fields));
//        echo $data;
//        $params = array(
//            'http' => array(
//                'method' => 'POST',
//                'header' => array(
//                    'Authorization: key='.GOOGLE_API_KEY,
//                    'Content-Type: application/x-www-form-urlencoded'
//                ),
//                'content' => $data
//            )
//        );
//        echo json_encode($params);
//        print_r($params);
//        $context = stream_context_create($params);
//        echo $context;
//        $result = file_get_contents(GOOGLE_GCM_URL, false, $context);
//        $headers = array(
//            'Authorization: key='.GOOGLE_API_KEY,
//            'Content-Type: application/json'
//        );
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, GOOGLE_GCM_URL);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
//        $result = curl_exec($ch);
//        $data = array(
//            'http' => array(
////                'method' => 'POST',
//                'header' => $headers,
//                'content' => $fields
//            )
//        );
//        if ($result === false) {
////            die('Problem occured: '.curl_error($ch));
//        }
//        curl_close($ch);
//        echo $result;
//        return $result;
    }
}