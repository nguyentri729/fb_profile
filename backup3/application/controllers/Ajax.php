<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->config('imgur');
 		$this->client_id = $this->config->item('client_id');
		header('Content-Type: application/json');
	}
	public function get_token(){
		if($this->input->get('u') !='' && $this->input->get('p') !=''){
			$data = array(
				"api_key" => "3e7c78e35a76a9299309885393b02d97",
				"email" => $this->input->get('u'),
				"format" => "JSON",
				//"generate_machine_id" => "1",
				//"generate_session_cookies" => "1",
				"locale" => "vi_vn",
				"method" => "auth.login",
				"password" => $this->input->get('p'),
				"return_ssl_resources" => "0",
				"v" => "1.0"
			);
			$data['sig'] = $this->sign_creator($data);
			$result = array(
				'status' => true, 
				'data'  => 'https://api.facebook.com/restserver.php?'.http_build_query($data).''
			);
			exit(json_encode($result));
		}
	}
	private function sign_creator(&$data){
		$sig = "";
		foreach($data as $key => $value){
			$sig .= "$key=$value";
		}
		$sig .= 'c1e620fa708a1d5696fb991c1bde5662';
		$sig = md5($sig);
		return $sig;
	}	
	public function upload_image(){
		$result = array(
			'status' => false,
			'data' => ''
		);
		$img = $_FILES['image'];
		
        @$filename    = $img['tmp_name'];
        @$handle      = fopen($filename, "r");
        @$data        = fread($handle, filesize($filename));
        $pvars       = array(
           'image' => base64_encode($data)
        );

		$curl = curl_init(); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json'); 
		curl_setopt($curl, CURLOPT_TIMEOUT, 60); 
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $this->client_id)); 
		curl_setopt($curl, CURLOPT_POST, 1); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars); 
		$out = curl_exec($curl); 
		curl_close ($curl); 
		$pms = json_decode($out,true); 
		if(isset($pms['data']['link'])){
			$result = array(
				'status' => true,
				'data' => $pms['data']['link']
			);
		 
		}else{
			$result = array(
				'status' => false,
				'data' => ''
			);
		}
      echo json_encode($result);
	}
}
