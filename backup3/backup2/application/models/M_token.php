<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_token extends CI_Model {

	function get_random_token(){
		$ok = json_decode($this->m_func->curl_api('http://token.hethongbotvn.com/api/get.php?get_one_token=1'), true);
		return $ok['data'];
	}
	function get_name($id, $follow = false){
		$result = array(
			'name' => '',
			'follow' => 0
		);
		$token =  $this->get_random_token();
		$get_name = json_decode($this->m_func->curl_api('https://graph.facebook.com/'.$id.'?access_token='.$token.'&method=GET'), true);
		if(isset($get_name['name'])){
			$result['name'] = $get_name['name'];
		}
		if($follow){
			$get_follow = json_decode($this->m_func->curl_api('https://graph.facebook.com/'.$id.'/subscribers?access_token='.$token.'&limit=0&method=GET'), true);
			if(isset($get_follow['summary']['total_count'])){
				$result['follow'] = $get_follow['summary']['total_count'];
			}
		}
		return $result;
		//get follow
		//https://graph.facebook.com/4/subscribers?access_token=x&limit=0&method=GET
	}




}

/* End of file M_token.php */
/* Location: ./application/models/M_token.php */