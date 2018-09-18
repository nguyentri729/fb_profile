
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_graph extends CI_Model {

    function check_token($token){
        $check = json_decode($this->curl_api('https://graph.facebook.com/me?access_token='.$token.'', 'GET'), true);
        if(isset($check['id'])){
            return $check;
        }else{
            return false;
        }

    }
    function get_uid_from_username($username, $token){

        $check = json_decode($this->curl_api('https://graph.facebook.com/'.$username.'?fields=id&access_token='.$token.'', 'GET'), true);

        if(isset($check['id'])){
            return $check['id'];
        }else{
            return '';
        }
       
    }



     function curl_api($url, $method){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_NOBODY, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); 
           
            curl_setopt($ch, CURLOPT_URL, $url);
                
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

            $html = curl_exec($ch);
            curl_close($ch);
            return $html;
    }

}

/* End of file M_graph.php */
/* Location: ./application/models/M_graph.php */