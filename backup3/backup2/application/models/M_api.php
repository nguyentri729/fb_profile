<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_api extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->config('api_server');
 		$this->api_link = $this->config->item('api_link');
 		$this->key = $this->config->item('key');
	}	

	function get_package($type){
		$get = $this->m_func->curl_api($this->api_link.'/get_package?key='.$this->key.'&type='.$type.'');
		return json_decode($get, true);


	}

	function update_viplike($arr){
		$data = base64_encode(json_encode($arr));
		$link = $this->api_link.'/edit_viplike?key='.$this->key.'&data='.$data.'';
		$get = json_decode($this->m_func->curl_api($link), true);
		return $get;
	}
	function add_viplike($arr){
		
		$data = base64_encode(json_encode($arr));
		$link = $this->api_link.'/add_viplike?key='.$this->key.'&data='.$data.'';
		$get = json_decode($this->m_func->curl_api($link), true);
		return $get;
	}

	function delete_viplike($id){
		$link = $this->api_link.'/delete_viplike?key='.$this->key.'&id_fb='.$id.'';
		$get = json_decode($this->m_func->curl_api($link), true);
	}


}

/* End of file M_api.php */
/* Location: ./application/models/M_api.php */